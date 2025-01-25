<?php
class User{
    public $firstName;
    public $lastName;
    public $email;

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }

    public function setEmail(string $email): void
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    public function getFullName(){
        return $this->firstName . ' ' . $this->lastName;
    }
}