<?php

namespace Source\Qualifield;

class User{
    private $firstName;
    private $lastName;
    private $email;

    private $error;
    public function setUser($firstName, $lastName, $email){
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
       
        if(!$this->setEmail($email)){
            $this->error = "O e-mail {$email} não é válido!";
            return false;
        }
        return true;
    }

    public function getError(){
        return $this->error;
    }


    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }

    private function setFirstName(string $firstName): void
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    }

    private function setLastName(string $lastName): void
    {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }

    private function setEmail(string $email): void
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    public function getFullName(){
        return $this->firstName . ' ' . $this->lastName;
    }
}