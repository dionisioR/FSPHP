<?php

namespace Source\Models;

use PDO;
use PDOException;
use Source\Database\Connect;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    public function __set($name, $value)
    {
        if(empty($this->data)){
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /** 
     * @return null|object
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /** 
     * @return \PDOException | null
     */
    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    /** 
     * @return null|string
     */
    public function message(): ?string
    {
        return $this->message;
    }

    protected function create() {
        
    }
    protected function read(string $select, string $params = null) : ?\PDOStatement {

        try{

            $stmt = Connect::getInstance()->prepare($select);

            if($params){
                parse_str($params, $params); // converte a string em array
                foreach($params as $key => $value){
                   $type = (is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                     $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;

        }catch(\PDOException $exception){
            $this->fail = $exception;
            return null;
        }
        
    }
    protected function update() {
        
    }
    protected function delete() {
        
    }
    protected function safe(): ?array {
        return null;
    }
    private function filter() {
        
    }
}
