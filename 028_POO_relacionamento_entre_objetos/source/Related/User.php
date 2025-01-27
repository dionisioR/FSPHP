<?php

namespace Source\Related;

class User
{
    private $job;
    private $firstName;
    private $lastName;

    public function __construct($job, $firstName, $lastName)
    {
        $this->job = $job;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    
}