<?php

$errors = [
    'fName' => "", 
    'lName' => "", 
    'Marital' => "", 
    'DOB' => "", 
    'Height' => "", 
    'Weight' => ""
];

$firstName = "";
$lastName = "";
$maritalStatus = "";
$dateOfBirth = time();
$height = "";
$heightFt = "";
$heightIn = "";
$weight = "";

$pAge = 0;
$pBMIN = 0;
$pBMIC = "Undefined";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (filter_input(INPUT_POST, 'pFirstName') != "") {
        $firstName = $_POST["pFirstName"];
    } else {
        $errors['fName'] = "You must input a first name.";
    }

    if (filter_input(INPUT_POST, 'pLastName') != "") {
        $lastName = $_POST["pLastName"];
    } else {
        $errors['lName'] = "You must input a last name.";
    }

    if (isset($_POST['pMarital']) && $_POST['pMarital'] != "default") {
        $maritalStatus = filter_var($_POST["pMarital"], FILTER_VALIDATE_BOOLEAN);
    } else {
        $maritalStatus = "default";
        $errors['Marital'] = "You must select an option.";
    }

    if (filter_input(INPUT_POST, 'pDOB') != "") {
        $dateOfBirth = strtotime($_POST["pDOB"]);
    } else {
        $errors['DOB'] = "You must select a date.";
    }

    if ((filter_input(INPUT_POST, 'pHeightFt') != "") && (filter_input(INPUT_POST, 'pHeightIn') != "")) {
        $heightFt = $_POST["pHeightFt"];
        $heightIn = $_POST["pHeightIn"];
        $height = (floatval($_POST["pHeightFt"])*12) + (floatval($_POST["pHeightIn"]));
    } else {
        $errors['Height'] = "You must input a height.";
    }

    if (filter_input(INPUT_POST, 'pWeight') != "") {
        $weight = floatval($_POST["pWeight"]);
    } else {
        $errors['Weight'] = "You must input a weight.";
    }
}

if ($errors == ['fName' => "", 'lName' => "", 'Marital' => "", 'DOB' => "", 'Height' => "", 'Weight' => ""] && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $pAge = floor((time() - $dateOfBirth) / 31540000);
    $pBMIN = 703*($weight/$height**2);
    if ($pBMIN < 16) {
        $pBMIC = "Severe Thinness";
        $textColor = "#C70039";
    } elseif ($pBMIN < 17) {
        $pBMIC = "Moderate Thinness";
        $textColor = "#FF5733";
    } elseif ($pBMIN < 18.5) {
        $pBMIC = "Mild Thinness";
        $textColor = "#FFC300";
    } elseif ($pBMIN < 25) {
        $pBMIC = "Normal";
        $textColor = "#DAF7A6";
    } elseif ($pBMIN < 30) {
        $pBMIC = "Overweight";
        $textColor = "#FFC300";
    } elseif ($pBMIN < 35) {
        $pBMIC = "Obese Class I";
        $textColor = "#FF5733";
    } elseif ($pBMIN < 40) {
        $pBMIC = "Obese Class II";
        $textColor = "#C70039";
    } elseif ($pBMIN > 40) {
        $pBMIC = "Obese Class III";
        $textColor = "#900C3F";
    }
    
    include 'patient.php';
} else {
    include "index.view.php";
}

