<?php

require ("db.php");

function login($username, $pass) {
    global $db;
    $results = [];

    $sql = "SELECT * FROM users WHERE username = :u";
    $stmt = $db->prepare($sql);
    $binds = array(
        ':u'=> $username,
    );
    
    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($results[0]["password"] == $pass) {
            return $results;
        } else {
            return false;
        }
    } 

    return false;
}

function createUser($username, $pass, $email) {
    global $db;

    $sql = 'INSERT INTO users (username, password, email) VALUES (:u, :p, :e)';
    $results = [];
    $stmt = $db->prepare($sql);
    $binds = array(
        ':u'=> $username,
        ':p'=> $pass,
        ':e'=> $email,
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "User Added";
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