<?php

namespace Source\Models;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

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
    protected function read() {
        
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
