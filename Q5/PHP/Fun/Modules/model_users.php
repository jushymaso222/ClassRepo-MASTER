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
    $userCheck = checkUsername($username);
    $emailCheck = checkEmail($email);
    $results = [];

    if($userCheck == false && $emailCheck == false) {
        $sql = 'INSERT INTO users (username, password, email) VALUES (:u, :p, :e)';
        $stmt = $db->prepare($sql);
        $binds = array(
            ':u'=> $username,
            ':p'=> $pass,
            ':e'=> $email,
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = "User Added";
        }
    } elseif($userCheck != false) {
        $results = "badUser";
    } elseif($emailCheck != false) {
        $results = "badEmail";
    }
    
    return $results;
}

function checkUsername($username) {
    global $db;

    $sql = "SELECT username FROM users WHERE username = :u";
    $results = false;
    $stmt = $db->prepare($sql);
    $binds = array(
        ":u"=> $username
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

function checkEmail($email) {
    global $db;

    $sql = "SELECT email FROM users WHERE email = :e";
    $results = false;
    $stmt = $db->prepare($sql);
    $binds = array(
        ":e"=> $email
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $results;
}

function getUsers() {
    global $db;
    $results = [];

    $stmt = $db->prepare("SELECT * FROM users");

    if($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    return $results;
}

function getUser($id) {
    global $db;
    $results = [];

    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $binds = array(
        ":id" => $id
    );

    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    return $results;
}

function updateUser($id, $username, $email, $password) {
    global $db;

    $sql = "UPDATE users SET username = :u, email = :e, password = :p WHERE id = :id";
    $results = [];
    $stmt = $db->prepare($sql);
    $binds = array(
        ":id"=> $id,
        ":u" => $username,
        ":e" => $email,
        ":p" => $password
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Updated user";
    }

    return $results;
}

function deleteUser($id) {
    global $db;

    $sql = "DELETE FROM users WHERE id = :id";
    $results = [];

    $stmt = $db->prepare($sql);
    $binds = array(
        ":id"=> $id
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Deleted User";
    }

    return $results;
}