<?php

include("models/model_patients.php");

$rawPatients = getPatients();
$patientList = '';

for ($i = 0; $i < count($rawPatients); $i++) {
    if ($rawPatients[$i]["patientMarried"] == 1) {
        $isMarried = "Married";
    } else {
        $isMarried = "Single";
    }

    $patient = "<tr> <th>" . $rawPatients[$i]["id"] . "</th>" 
        . "<td>" . $rawPatients[$i]["patientFirstName"] . "</td>"
        . "<td>" . $rawPatients[$i]["patientLastName"] . "</td>"
        . "<td>" .  $isMarried . "</td>"
        . "<td>" . $rawPatients[$i]["patientBirthDate"] . "</td>"
        . "<td>" . '<a href="index.php?redirect=intake&action=Edit&id=' . $rawPatients[$i]["id"] . '" class="editLink">Edit</a> </td> </tr>';

    $patientList .= $patient;
}




include("index.view.php");