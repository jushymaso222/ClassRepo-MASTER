<?php 

include "person.php";

class Student extends Person 
{
    public $studentID;
    public function __construct($firstName, $lastName, $studentID) 
    {
        parent::__construct($firstName, $lastName);
        $this->studentID = $studentID;
    }

    public function getPersonInfo(): mixed {
        return $this->first . ' ' . $this->last . ' ( ' . $this->studentID . ' )';
    }
}