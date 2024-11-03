<?php

session_start();

include("../../Modules/model_activities.php");

if (isset($_GET["state"])) {
    $state = $_GET["state"];

    $activityList = getActivities($state);
}

$errors = [
    'name' => "", 
    'link' => ""
];

$name = "";
$desc = "";
$link = "";
$price = NULL;
$route = "";
$priority = "";
$notes = "";

if (isset($_GET["id"])) {
    $infoList = getActivity($_GET["id"]);
    $name = $infoList["name"];
    $_SESSION["id"] = $infoList["id"];
    $desc = $infoList["description"];
    $link = $infoList["link"];
    $price = (float)$infoList["price"];
    $route = $infoList["route"];
    $priority = $infoList["priority"];
    $notes = $infoList["notes"];
} else {
    $infoList = "";
}

function removeqsvar($url, $varname) {
    return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$url);
}


if (isset($_POST['submit'])) 
{
    if ($_POST["actname"] == "") {
        $errors["name"] = "A name is required for each activity.";
    }
    if (isset($_POST["link"]) && $_POST["link"] == "") {
        $errors["link"] = "A link is required for each activity.";
    }

    if ($errors == ['name' => "", 'link' => ""]) {
        $name = $_POST["actname"];
        if (isset($_POST["desc"])) {
            $desc = $_POST["desc"];
        }
        $link = $_POST["link"];
        if (isset($_POST["price"])) {
            $price = $_POST["price"];
        }
        if (isset($_POST["route"])) {
            $route = $_POST["route"];
        }
        if (isset($_POST["priority"])) {
            $priority = $_POST["priority"];
        }
        if (isset($_POST["notes"])) {
            $notes = $_POST["notes"];
        }
        addActivity($state, $name, $desc, $link, $price, $route, $priority, $notes);
        $infoList = "";
        header("Refresh:0");
    }
} 

if (isset($_POST["update"])) { 
    if ($_POST["actname"] == "") {
        $errors["name"] = "*A name is required for each activity.";
    }
    if (isset($_POST["link"]) && $_POST["link"] == "") {
        $errors["link"] = "*A link is required for each activity.";
    }

    if ($errors == ['name' => "", 'link' => ""]) {
        $name = $_POST["actname"];
        if (isset($_POST["desc"])) {
            $desc = $_POST["desc"];
        }
        $link = $_POST["link"];
        if (isset($_POST["price"])) {
            $price = $_POST["price"];
        }
        if (isset($_POST["route"])) {
            $route = $_POST["route"];
        }
        if (isset($_POST["priority"])) {
            $priority = $_POST["priority"];
        }
        if (isset($_POST["notes"])) {
            $notes = $_POST["notes"];
        }
        updateActivity($_SESSION["id"],  $name, $desc, $link, $price, $route, $priority, $notes);
        $infoList = "";
        header("Refresh:0");
    }
}

if (isset($_POST["delete"])) {
    deleteActivity($_SESSION["id"]);
    $infoList = "";
    header("Refresh:0");
}




if (isset($_GET["reset"])) {
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "id");
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "reset");
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "reset-close");
    $infoList = [];
} 

if (isset($_GET["reset-close"])) {
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "id");
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "reset");
    removeqsvar("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", "reset-close");
    $infoList = "";
} 


if ($activityList) {
    $activityListElements = "";
    for ($i = 0; $i < count($activityList); $i++) {
        $activity = $activityList[$i];

        if (!$activity["price"]) {
            $activity["price"] = 0;
        }

        $htmlElement = "<tr>";
        $htmlElement .= "<td>".$activity["name"]."</td>";
        $htmlElement .= "<td>".$activity["description"]."</td>";
        $htmlElement .= '<td> <a href="'.$activity["link"].'" target="_blank" class="table-link">'.$activity["name"].'</a></td>';
        $htmlElement .= "<td>$".$activity["price"]."</td>";
        $htmlElement .= "<td>".$activity["route"]."</td>";
        $htmlElement .= "<td>".$activity["priority"]."</td>";
        $htmlElement .= "<td>".$activity["notes"]."</td>";
        $htmlElement .= '<td> <a href="info.php?state='.$state.'&id='.$activity["id"].'" class="table-link">Edit</a> </td>';
        $htmlElement .= "</td>";

        $activityListElements .= $htmlElement;
    }
} else {
    $activityListElements = "";
}







include("info.view.php");