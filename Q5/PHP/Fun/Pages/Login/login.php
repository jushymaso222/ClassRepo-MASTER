<?php


if(isset($_GET["action"])) {
    $action = $_GET["action"];
}

$userError = false;
$emailError = false;
$passError = false;

if(isset($_POST["signin"])) {
    if(!isset($_POST["username"]) || $_POST["username"] == "") {
        $userError = true;
    }
    if(!isset($_POST["email"]) || $_POST["email"] == "") {
        $emailError = true;
    }
    if(!isset($_POST["password"]) || $_POST["password"] == "") {
        $passError = true;
    }

    if (!$passError && !$userError && !$emailError) {
        
    }
}


include("login.view.php");