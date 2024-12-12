<?php

session_start();

include("../../Modules/model_users.php");

$users = getUsers();

function removeqsvar($url, $varname) {
    return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$url);
}

if(isset($_POST["logout"])) {
    unset($_SESSION["user"]);
    header("Location: ../../index.php");
}

if(isset($_GET["userId"])) {
    $editUser = getUser($_GET["userId"]);
    $username = $editUser[0]["username"];
    $email = $editUser[0]["email"];
    $password = $editUser[0]["password"];
}

if(isset($_POST["update"]) && isset($_GET["userId"])) {
    updateUser($editUser[0]["id"], $_POST["username"],$_POST["email"],$_POST["password"]);
    $users = getUsers();
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "userId");
}

if(isset($_POST["delete"]) && isset($_GET["userId"])) {
    deleteUser($editUser[0]["id"]);
    $users = getUsers();
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "userId");
}

if ($users) {
    $usersElements = "";
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];

        $htmlElement = "<tr>";
        $htmlElement .= "<td>".$user["id"]."</td>";
        $htmlElement .= "<td>".$user["username"]."</td>";
        $htmlElement .= "<td>".$user["email"]."</td>";
        $htmlElement .= "<td>".$user["password"]."</td>";
        $htmlElement .= '<td> <a href="admin.php?userId='.$user["id"].'" class="table-link">Edit</a> </td>';
        $htmlElement .= "</tr>";

        $usersElements .= $htmlElement;
    }
} else {
    $usersElements = "";
}

include("admin.view.php");