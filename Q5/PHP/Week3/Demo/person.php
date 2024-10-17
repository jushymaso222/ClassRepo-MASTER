<?php

abstract class Person
{
    protected $first;
    protected $last;
    protected $ID;

    public function __construct($firstName, $lastName)
    {
        $this->first = $firstName;
        $this->last = $lastName;
    }

    public function setFirst($firstName): void
    {
        $this->first = $firstName;
    }

    public function getFirst(): string
    {
        return $this->first;
    }

    public function setLast($lastName): void
    {
        $this->last = $lastName;
    }

    public function getLast(): string
    {
        return $this->last;
    }

    public function getFullName(): string
    {
        return $this->first ." ". $this->last;
    }

    abstract function getPersonInfo();
}

