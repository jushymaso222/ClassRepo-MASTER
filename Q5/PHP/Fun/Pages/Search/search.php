<?php

include("../../Modules/model_activities.php");
session_start();

$activityList = "";

if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

if(isset($_SESSION["user"]) && $_SESSION["user"] != "") {
    $activityList = searchActivities($search, $_SESSION["user"][0]["username"]);
}

if ($activityList) {
    $activityListElements = "";
    for ($i = 0; $i < count($activityList); $i++) {
        $activity = $activityList[$i];

        if (!$activity["price"]) {
            $activity["price"] = 0;
        }

        $htmlElement = "<tr>";
        $htmlElement .= "<td>".$activity["id"]."</td>";
        $htmlElement .= "<td>".$activity["state"]."</td>";
        $htmlElement .= "<td>".$activity["name"]."</td>";
        $htmlElement .= "<td>".$activity["description"]."</td>";
        $htmlElement .= '<td> <a href="'.$activity["link"].'" target="_blank" class="table-link">'.$activity["name"].'</a></td>';
        $htmlElement .= "<td>$".$activity["price"]."</td>";
        if ($activity["route"] != "" && $activity["route"] != NULL) {
            $htmlElement .= '<td> <a href="'.$activity["route"].'" class="table-link" target="_blank">Map</a> </td>';
        } else {
            $htmlElement .= "<td>".$activity["route"]."</td>";
        }
        $htmlElement .= "<td>".$activity["priority"]."</td>";
        $htmlElement .= "<td>".$activity["notes"]."</td>";
        $htmlElement .= '<td> <a href="../Info/info.php?state='.$activity["state"].'&id='.$activity["id"].'" class="table-link">Edit</a> </td>';
        $htmlElement .= "</td>";

        $activityListElements .= $htmlElement;
    }
} else {
    $activityListElements = "";
}


include("search.view.php");