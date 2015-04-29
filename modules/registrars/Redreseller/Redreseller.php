<?php

    function Redreseller_getConfigArray() {
        $configarray = array(
            'Webservice_id' => array(
                'Type' => 'text', 'Size' => '36', 'Description' => 'Enter webservice id here'
            ),
            'Webservice_pass' => array(
                'Type' => 'text', 'Size' => '36', 'Description' => 'Enter webservice password here'
            ),
            'TestMode' => array(
                'Type' => 'yesno'
            )
        );

        return $configarray;
    }

    function Redreseller_RegisterDomain($params) {
        $domain = $params['sld'] . '.' . $params['tld'];
        $handle = $params['additionalfields']['NIC Handle'];
        $duration = (int)$params['regperiod'] * 12;
        $ns1 = $params['ns1'];
        $ns2 = $params['ns2'];
        $testmode = $params['TestMode'];

        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->PayDomain(
            array('webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']),
            $domain,
            $handle,
            $duration,
            array(
                'ns1' => $ns1,
                'ns2' => $ns2
            )
        );	

        mysql_query("INSERT INTO `redreseller_log`(`domain`,`email`,`handle`,`duration`,`ns1`,`ns2`,`type`,`result`,`date`) VALUES ('" . $domain . "','" . $params['email'] . "','" . $handle . "','" . $duration . "','" . $ns1 . "','" . $ns2 . "','ثبت','" . $res . "','" . time() . "')");
        
        if ($testmode == 'on') {
            if ((int)$res != 1001) {
                $values['error'] = 'error number = ' . $res;
            }
        } else {
            if ((int)$res != 1000) {
                $values['error'] = 'error number = ' . $res;
            }
        }
        return $values;
    }

    function Redreseller_RenewDomain($params) {
        $domain = $params['sld'] . '.' . $params['tld'];
        $duration = (int)$params['regperiod'] * 12;
        $testmode = $params['TestMode'];
        
        // include('..\..\..\configuration.php');
        
        // $link = mysql_connect($db_host, $db_username, $db_password);
        // mysql_select_db($db_name);
        // mysql_query('SET NAMES \'utf8\'', $link);
        $result = mysql_query('select tblclients.email from tbldomains,tblclients where tbldomains.domain=\'' . $domain . '\'');

        $row = mysql_fetch_row($result);
        $email = $row[0];

        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->PayDomain(
            array('webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']),
            $domain,
            $handle,
            $duration,
            array(
                'ns1' => '',
                'ns2' => ''
            )
        );

        mysql_query("INSERT INTO `redreseller_log`(`domain`,`email`,`handle`,`duration`,`ns1`,`ns2`,`type`,`result`,`date`) VALUES ('" . $domain . "','" . $params['email'] . "','" . $handle . "','" . $duration . "','" . $ns1 . "','" . $ns2 . "','تمدید','" . $res . "','" . time() . "')");

        if ($testmode == 'on') {
            if ((int)$res != 1001) {
                $values['error'] = 'error number = ' . $res;
            }
        } else {
            if ((int)$res != 1000) {
                $values['error'] = 'error number = ' . $res;
            }
        }

        return $values;
    }

    function Redreseller_Sync($params) {
        $domain = $params['sld'] . '.' . $params['tld'];
        
        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->DomainInfo(
            array('webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']),
            $domain
        );
        
        $values = array();
        if (!is_numeric($res)) {
            $res = json_decode($res, true);
            if (!empty($res['domain']['expireDate'])) {
                $res['domain']['expireDate'] = strtotime($res['domain']['expireDate']);

                $values['expirydate'] = date('Y-m-d', $res['domain']['expireDate']);
                if ($res['domain']['expireDate'] > time()) {
                    $values['active'] = true;
                } else {
                    $values['expired'] = true;
                }
            }	
        }
        return $values;
    }

?>