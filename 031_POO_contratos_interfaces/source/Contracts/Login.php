<?php

namespace Source\Contracts;

class Login
{
    private $logged;
    public function loginUser(User $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    public function loginAdmin(UserAdmin $user): UserAdmin
    {
        $this->logged = $user;
        return $this->logged;
    }

    // qualquer objeto que implemente a interface UserInterface pode ser passado como argumento
    public function login(UserInterface $user) : UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}