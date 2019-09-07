<?php

    function redreseller_getConfigArray()
    {
        $configarray = [
            'Webservice_id' => [
                'Type' => 'text', 'Size' => '36', 'Description' => 'Enter webservice id here',
            ],
            'Webservice_pass' => [
                'Type' => 'text', 'Size' => '36', 'Description' => 'Enter webservice password here',
            ],
            'TestMode' => [
                'Type' => 'yesno',
            ],
        ];

        return $configarray;
    }

    function redreseller_RegisterDomain($params)
    {
        $domain = $params['sld'].'.'.$params['tld'];
        $handle = $params['additionalfields']['NIC Handle'];
        $duration = (int) $params['regperiod'] * 12;
        $testmode = $params['TestMode'];

        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->PayDomain(
            ['webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']],
            $domain,
            $handle,
            $duration,
            [
                'ns1' => $params['ns1'],
                'ns2' => $params['ns2'],
                'ns3' => $params['ns3'],
                'ns4' => $params['ns4'],
            ]
        );

        mysql_query("INSERT INTO `redreseller_log`(`domain`,`email`,`handle`,`duration`,`ns1`,`ns2`,`type`,`result`,`date`) VALUES ('".$domain."','".$params['email']."','".$handle."','".$duration."','".$ns1."','".$ns2."','ثبت','".$res."','".time()."')");

        if ($testmode == 'on') {
            if ((int) $res != 1001) {
                $values['error'] = 'error number = '.$res;
            }
        } else {
            if ((int) $res != 1000) {
                $values['error'] = 'error number = '.$res;
            }
        }

        return $values;
    }

    function redreseller_RenewDomain($params)
    {
        $domain = $params['sld'].'.'.$params['tld'];
        $duration = (int) $params['regperiod'] * 12;
        $testmode = $params['TestMode'];

        $result = mysql_query('select tblclients.email from tbldomains,tblclients where tbldomains.domain=\''.$domain.'\'');

        $row = mysql_fetch_row($result);
        $email = $row[0];

        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->PayDomain(
            ['webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']],
            $domain,
            $handle,
            $duration,
            [
                'ns1' => '',
                'ns2' => '',
                'ns3' => '',
                'ns4' => '',
            ]
        );

        mysql_query("INSERT INTO `redreseller_log`(`domain`,`email`,`handle`,`duration`,`ns1`,`ns2`,`type`,`result`,`date`) VALUES ('".$domain."','".$params['email']."','".$handle."','".$duration."','".$ns1."','".$ns2."','تمدید','".$res."','".time()."')");

        if ($testmode == 'on') {
            if ((int) $res != 1001) {
                $values['error'] = 'error number = '.$res;
            }
        } else {
            if ((int) $res != 1000) {
                $values['error'] = 'error number = '.$res;
            }
        }

        return $values;
    }

    function redreseller_GetNameservers($params)
    {
        $domain = $params['sld'].'.'.$params['tld'];

        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->DomainInfo(
            ['webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']],
            $domain
        );
        $values = [];
        if (!is_numeric($res)) {
            for ($i = 0; $i < count($res['domain']['dns']); $i++) {
                $values['ns'.($i + 1)] = $res['domain']['dns'][$i];
            }
        } else {
            $values['error'] = 'error number = '.$res;
        }

        return $values;
    }

    function redreseller_Sync($params)
    {
        $domain = $params['sld'].'.'.$params['tld'];

        $client = new SoapClient('http://www.redreseller.com/WebService/wsdl');
        $res = $client->DomainInfo(
            ['webservice_id' => $params['Webservice_id'], 'webservice_pass' => $params['Webservice_pass']],
            $domain
        );
        $res=json_decode($res,true);
        $values = [];
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
