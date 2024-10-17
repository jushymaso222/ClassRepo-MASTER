<?php

include "./modules/checking.php";
include "./modules/savings.php";

session_start();

// Check if the session variables already exist
if (!isset($_SESSION["checking"])) {
    $_SESSION["checking"] = new CheckingAccount('2398712398478', 0, date("Y/m/d"));
    $_SESSION["checking"]->deposit("1000", "Initial Account Balance");
}

if (!isset($_SESSION["savings"])) {
    $_SESSION["savings"] = new SavingsAccount('2398712398479', 0, date("Y/m/d"));
    $_SESSION["savings"]->deposit("500", "Initial Account Balance");
}

$checkingAccountNumber = $_SESSION["checking"]->getAccountId();
$savingsAccountNumber = $_SESSION["savings"]->getAccountId();

$accountType = '';

function getTransactions($checking, $savings, $type): void {
    if ($type == "Checking") {
        $var = $_SESSION["checking"]->getTransactions();
    } else {
        $var = $_SESSION["savings"]->getTransactions();
    }

    $list = '';

    for ($i = count($var)-1; $i >= 0; $i--) {
        if ((int)$var[$i]["amount"] >= 0) {
            $color = "green";
            $sign = "+";
        } else {
            $color = "red";
            $sign = "-";
        }

        $element = '<div class="transaction">';
        $element .= '<div class="transaction-left">';
        $element .= '<h3 class="transaction-desc">' . $var[$i]["desc"] . "</h3>";
        $element .= '<h3 class="transaction-time">' . $var[$i]["time"] . "</h3>";
        $element .= "</div>";
        $element .= '<div class="transaction-right">';
        $element .= '<h3 style="color:' . $color . ' ">' . $sign . '$' . abs(round($var[$i]["amount"], 2)) . "</h3>";
        $element .= '<h3 class="transaction-balance">$' . abs(round($var[$i]["balance"], 2)) . "</h3>";
        $element .= "</div>";
        $element .= "</div>";

        $list .= $element;
    }
    echo $list;
}

parse_str($_SERVER['QUERY_STRING'], $params);
if (isset($params['type'])) {
    if ($params['type'] == 'checking') {
        $accountType = "Checking";
        $number = $checkingAccountNumber;
    } else {
        $accountType = "Savings";
        $number = $savingsAccountNumber;
    }

    include "accountPage.php";
} else {
    include "index.view.php";
}