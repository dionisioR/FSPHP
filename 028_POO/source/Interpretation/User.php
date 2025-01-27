<?php

namespace Source\Interpretation;

use ReflectionFunctionAbstract;

class User
{
    private $firstName;
    private $lastName;
    private $email;

    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function __clone()
    {
        $this->firstName = null;
        $this->lastName = null;
        $this->email = null;
        echo "<p class='alert alert-success'>Clonagem de objeto finalizada!!!</p>";
    }

    public function __destruct()
    {
        // echo '<pre>';
        var_dump($this);
        // echo '</pre>';
        echo "<p class='alert alert-danger container'>Objeto destruído!!!</p>";
    }
}