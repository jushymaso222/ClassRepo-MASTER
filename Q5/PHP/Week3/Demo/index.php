<?php

include "student.php";
$person = new Student("Joshua", "Mason", '008021377');

?>

<h1><?= $person->getPersonInfo(); ?></h1>