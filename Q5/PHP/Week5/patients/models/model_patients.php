<?php

require ("db.php");

function getPatients() {
    global $db;
    $results = [];

    $stmt = $db->prepare("SELECT * FROM patients");
    $stmt->execute();
    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    return $results;
}

function addPatient($firstName, $lastName, $maritalStatus, $dateOfBirth) {
    global $db;

    $sql = 'INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) VALUES (:f, :l, :m, :d)';
    $results = [];
    $stmt = $db->prepare($sql);
    $binds = array(
        ':f'=> $firstName,
        ':l'=> $lastName,
        ':m'=> $maritalStatus,
        ':d'=> $dateOfBirth
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Patient Added";
    }

    return $results;
}

function getPatient($id) {
    global $db;

    $sql = "SELECT * FROM patients WHERE id = :id";
    $results = [];
    $stmt = $db->prepare($sql);
    $binds = array(
        ":id"=> $id
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

function updatePatient($id, $firstName, $lastName, $maritalStatus, $dateOfBirth) {
    global $db;

    $sql = "UPDATE patients SET patientFirstName = :f, patientLastName = :l, patientMarried = :m, patientBirthDate = :d WHERE id = :id";
    $results = [];
    $stmt = $db->prepare($sql);
    $binds = array(
        ":id"=> $id,
        ":f"=> $firstName,
        ":l"=> $lastName,
        ":m"=> $maritalStatus,
        ":d"=> $dateOfBirth
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Updated Patient";
    }

    return $results;
}

function deletePatient($id) {
    global $db;

    $sql = "DELETE FROM patients WHERE id = :id";
    $results = [];

    $stmt = $db->prepare($sql);
    $binds = array(
        ":id"=> $id
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Deleted Patient";
    }

    return $results;
}