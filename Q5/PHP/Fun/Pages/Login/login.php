<?php

include("../../Modules/model_users.php");

if(isset($_GET["action"])) {
    $action = $_GET["action"];
}

$userError = false;
$emailError = false;
$passError = false;

if(isset($_POST["signin"])) {
    if(!isset($_POST["username"]) || $_POST["username"] == "") {
        $userError = true;
    } else {
        $emailError = false;
    }
    if(!isset($_POST["email"]) || $_POST["email"] == "") {
        $emailError = true;
    } else {
        $emailError = false;
    }
    if(!isset($_POST["password"]) || $_POST["password"] == "") {
        $passError = true;
    } else {
        $emailError = false;
    }

    if (!$passError && !$userError && !$emailError) {
        $result = login($_POST["username"], $_POST["password"]);

        if ($result != false) {
            header("Location: ../../index.php?action=signin");
        }
    }
}

if(isset($_POST["create"])) {
    if(!isset($_POST["username"]) || $_POST["username"] == "") {
        $userError = true;
    } else {
        $emailError = false;
    }
    if(!isset($_POST["email"]) || $_POST["email"] == "") {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = true;
        } else {
            $emailError = true;
        }
    } else {
        $emailError = false;
    }
    if(!isset($_POST["password"]) || $_POST["password"] == "") {
        $passError = true;
    } else {
        $emailError = false;
    }

    if (!$passError && !$userError && !$emailError) {
        $result = createUser($_POST["username"], $_POST["password"],$_POST["email"]);

        if ($result != false) {
            header("Location: login.php?action=signin");
        }
    }
}


include("login.view.php");