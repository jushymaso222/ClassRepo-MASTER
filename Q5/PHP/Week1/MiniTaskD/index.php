<?php

$person = [
    'age' => 21,
    'hair' => 'brown',
    'career' => 'software'
];

$person['name'] = "Joshua"; //adding a new key

//Test stuff
// echo '<pre>'; 
// var_dump($person);
// echo '</pre>';
// die();

require 'index.view.php'; //HTML view
