<?php

$checkingAccountNumber = '2398712398478';
$savingsAccountNumber = '0093802809039';


$accountType = '';

parse_str($_SERVER['QUERY_STRING'], $params);
if (isset($params['type'])) {
    if (isset($params['type'])) {
        if ($params['type'] == 'checking') {
            $accountType = "Checking";
            $number = $checkingAccountNumber;
        } else {
            $accountType = "Savings";
            $number = $savingsAccountNumber;
        }
    } else {
        $accountType = "Undefined";
    }
    include "accountPage.php";
} else {
    include "index.view.php";
}

