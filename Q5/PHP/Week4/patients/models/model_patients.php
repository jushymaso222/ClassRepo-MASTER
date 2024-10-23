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

