<?php

namespace Source\Members;

class Config
{
    // constantes
    public const COMPANY = "RD3W";
    protected const DOMAIN = "@rd3w.com.br";
    private const SECTOR = 'TI';

    // propriedades
    public static $company;
    public static $domain;
    public static $sector;

    // métodos
    public static function setConfig($company, $domain, $sector){
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
    
}