<?php

require ("db.php");

function getActivities($state) {
    global $db;
    $results = [];

    $stmt = $db->prepare("SELECT id, name, description, link, price, route, priority, notes FROM activities WHERE state = :s");
    $binds = array(
        ":s"=> $state
    );

    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    return $results;
}

function searchActivities($searchTerm) {
    global $db;
    $results = [];

    $stmt = $db->prepare("SELECT * FROM activities WHERE 0=0 AND state LIKE :s OR name LIKE :n");
    $binds = array(
        ":s"=> '%' . $searchTerm . '%',
        ":n"=> '%' . $searchTerm . '%'
    );

    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    return $results;
}

function addActivity($state, $name, $desc, $link, $price, $route, $priority, $notes) {
    global $db;

    if ($price != NULL) {
        $sql = 'INSERT INTO activities (state, name, description, link, price, route, priority, notes) VALUES (:s, :n, :d, :l, :p, :r, :pr, :no)';
    } else {
        $sql = 'INSERT INTO activities (state, name, description, link, route, priority, notes) VALUES (:s, :n, :d, :l, :r, :pr, :no)';
    }
    
    $results = [];
    $stmt = $db->prepare($sql);
    if ($price != NULL) {
        $binds = array(
            ':s'=> $state,
            ':n'=> $name,
            ':d'=> $desc,
            ':l'=> $link,
            ':p'=> $price,
            ':r'=> $route,
            ':pr' => $priority,
            ':no'=> $notes
        );
    } else {
        $binds = array(
            ':s'=> $state,
            ':n'=> $name,
            ':d'=> $desc,
            ':l'=> $link,
            ':r'=> $route,
            ':pr' => $priority,
            ':no'=> $notes
        );
    }
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Activity Added";
    }

    return $results;
}

function getActivity($id) {
    global $db;

    $sql = "SELECT * FROM activities WHERE id = :id";
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

function updateActivity($id, $name, $desc, $link, $price, $route, $priority, $notes) {
    global $db;

    $sql = "UPDATE activities SET name = :n, description = :d, link = :l, price = :p, route = :r, priority = :pr, notes = :no WHERE id = :id";
    $results = [];
    $stmt = $db->prepare($sql);
    $binds = array(
       ":id"=> $id,
       ":n"=> $name,
       ":d"=> $desc,
       ":l"=> $link,
       ":r"=> $route,
       ":pr"=> $priority,
       ":no"=> $notes,
       ":p"=> $price
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Updated Activity";
    }

    return $results;
}

function deleteActivity($id) {
    global $db;

    $sql = "DELETE FROM activities WHERE id = :id";
    $results = [];

    $stmt = $db->prepare($sql);
    $binds = array(
        ":id"=> $id
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Deleted Activity";
    }

    return $results;
}