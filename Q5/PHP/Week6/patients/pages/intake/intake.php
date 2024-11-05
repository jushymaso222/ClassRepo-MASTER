<?php

include("models/model_patients.php");

$errors = [
    'fName' => "", 
    'lName' => "", 
    'Marital' => "", 
    'DOB' => "", 
];

$firstName = "";
$lastName = "";
$maritalStatus = "";
$dateOfBirth = time();

function set_url( $url )
{
    echo('<script>window.location.href = "' . $url .'";</script>');
}

if (isset($_GET["action"])) {
    $action = filter_input(INPUT_GET,"action");
    $id = filter_input(INPUT_GET,"id");

    $patient = getPatient($id);
    if ($patient) {
        $firstName = $patient["patientFirstName"];
        $lastName = $patient["patientLastName"];
        $maritalStatus = filter_var($patient["patientMarried"], FILTER_VALIDATE_BOOLEAN);
        $dateOfBirth = strtotime($patient["patientBirthDate"]);
    }
}

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
}

if ($errors == ['fName' => "", 'lName' => "", 'Marital' => "", 'DOB' => ""] && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($maritalStatus) {
        $boolNum = 1;
    } else {
        $boolNum = 0;
    }

    if (isset($_POST["addPatient"])) {
        addPatient($firstName, $lastName, $boolNum, filter_input(INPUT_POST, 'pDOB'));
    } elseif (isset($_POST["updatePatient"])) {
        updatePatient($id, $firstName, $lastName, $boolNum, filter_input(INPUT_POST,"pDOB"));
    } elseif (isset($_POST["deletePatient"])) {
        deletePatient($id);
    }

    set_url("index.php?redirect=index");
} else {
    include "intake.view.php";
}

