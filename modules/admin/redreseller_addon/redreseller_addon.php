<?php
    if (!defined('WHMCS')) {
        exit('This file cannot be accessed directly');
    }

    $maxRows_log = 20;
    $pageNum_log = 0;

    if (isset($_GET['page'])) {
        $pageNum_log = $_GET['page'] - 1;
    }

    $startRow_log = $pageNum_log * $maxRows_log;
    $query_log = 'SELECT * FROM redreseller_log ORDER BY id DESC';
    $query_limit_log = sprintf('%s LIMIT %d, %d', $query_log, $startRow_log, $maxRows_log);

    if (!($log = @mysql_query($query_limit_log))) {
        mysql_query('CREATE TABLE IF NOT EXISTS `redreseller_log` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `domain` varchar(32) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
          `email` varchar(32) NOT NULL,
          `handle` varchar(32) NOT NULL,
          `duration` varchar(8) NOT NULL,
          `ns1` varchar(32) NOT NULL,
          `ns2` varchar(32) NOT NULL,
          `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
          `result` varchar(32) NOT NULL,
          `date` int(11) NOT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM');
    }

    $all_log = @mysql_query($query_log);
    $totalRows_log = @mysql_num_rows($all_log);
    $totalPages_log = ceil($totalRows_log / $maxRows_log) - 1;
    echo '
    <style>
        fieldset{
            -moz-border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            border: 4px solid #ccc;
            padding: 5px;
            margin: 10px 0;
            direction: rtl;
            font-family: Tahoma;
            text-align: right;
        }
        
        fieldset *{
            font-family: Tahoma;
        }

        fieldset legend{
            padding: 5px 30px;
            background-color: #ccc;
            font-weight: 900;
            margin-right: 14px;
        }
    </style>
    
    <fieldset>
        <legend>دامین های ثبت شده</legend>
    ';

    if ($totalRows_log == 0) {
        echo 'فاقد فعاليت';

        return 1;
    }


    if (0 < $pageNum_log) {
        echo '<a href="addonmodules.php?module=redreseller_addon&logs&page='.(max(0, $pageNum_log - 1) + 1).'">صفحه قبل</a> | ';
    }

    if (1 < $totalPages_log) {
        for ($i = 0; $i <= $totalPages_log; $i++) {
            $abc = $i + 1;
            if ($pageNum_log == $i) {
                echo '('.$abc.') ';
            } else {
                echo '<a href=\'addonmodules.php?module=redreseller_addon&logs&page='.$abc.'\'>'.$abc.'</a> ';
            }
        }
    }

    if ($pageNum_log < $totalPages_log) {
        echo '| <a href="addonmodules.php?module=redreseller_addon&logs&page='.(min($totalPages_log, $pageNum_log + 1) + 1).'">صفحه بعد</a>';
    }

    echo '<table width=\'70%\'>'
        .'<tr>'
        .'<td><b>دامین</b></td><td><b>ایمیل</b></td><td><b>نیک هندل</b></td><td><b>مدت</b></td><td><b>ns1</b></td><td><b>ns2</b></td><td><b>نوع</b></td><td><b>نتیجه</b></td><td><b>زمان</b></td>'
        .'</tr>';
    while ($row_log = mysql_fetch_assoc($log)) {
        echo '<tr>'
            .'<td style=\'border:1px solid black;\'>'.$row_log['domain'].'</td><td style=\'border:1px solid black;\'>'.$row_log['email'].'</td><td style=\'border:1px solid black;\'>'.$row_log['handle'].'</td><td style=\'border:1px solid black;\'>'.$row_log['duration'].'</td><td style=\'border:1px solid black;\'>'.$row_log['ns1'].'</td><td style=\'border:1px solid black;\'>'.$row_log['ns2'].'</td><td style=\'border:1px solid black;\'>'.$row_log['result'].'</td><td style=\'border:1px solid black;\'>'.$row_log['type'].'</td>'
            .'<td style=\'border:1px solid black;\'>'.date('Y-m-d, G:i', $row_log['date']).'</td>'
            .'</tr>';
    }

    echo '</table><br />';

    if (0 < $pageNum_log) {
        echo '<a href="addonmodules.php?module=redreseller_addon&logs&page='.(max(0, $pageNum_log - 1) + 1).'">صفحه قبل</a> | ';
    }

    if (1 < $totalPages_log) {
        for ($i = 0; $i <= $totalPages_log; $i++) {
            $abc = $i + 1;
            if ($pageNum_log == $i) {
                echo '('.$abc.') ';
            } else {
                echo '<a href=\'addonmodules.php?module=redreseller_addon&logs&page='.$abc.'\'>'.$abc.'</a> ';
            }
        }
    }
    if ($pageNum_log < $totalPages_log) {
        echo '| <a href="addonmodules.php?module=redreseller_addon&logs&page='.(min($totalPages_log, $pageNum_log + 1) + 1).'">صفحه بعد</a><br /><br />';
    }

    return 1;
