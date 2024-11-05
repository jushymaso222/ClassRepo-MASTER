<?php

const defaultLogin = [
    "username"=> "admin",
    "password"=> "password",
];

if (isset($_POST["username"]) && $_POST["password"]) { 
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == defaultLogin["username"] && $password == defaultLogin["password"]) {
        $_SESSION["user"] = $username;
        header("Location: index.php?redirect=backend");
    }
}



include("login.view.php");