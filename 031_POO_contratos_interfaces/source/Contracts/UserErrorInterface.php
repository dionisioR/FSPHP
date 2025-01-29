<?php

namespace Source\Contracts;

use Error;

interface UserErrorInterface
{

    public function setError($error);
    public function getError();   
    
}