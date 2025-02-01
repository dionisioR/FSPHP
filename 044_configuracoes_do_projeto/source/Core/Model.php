<?php

namespace Source\Core;

use PDO;
use PDOException;


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
        if (empty($this->data)) {
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

    // entity = tabela do banco de dados
    // data = array com os dados a serem inseridos
    protected function create(string $entity, array $data) : ?int{

        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        try {
            $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter($data));
            // echo "INSERT INTO {$entity} ({$columns}) VALUES ({$values})";

            return Connect::getInstance()->lastInsertId();
            // print_r($stmt);
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }

        echo "<br>";
        var_dump($entity, $data);
    }

    protected function read(string $select, string $params = null): ?\PDOStatement
    {

        try {

            $stmt = Connect::getInstance()->prepare($select);

            if ($params) {
                parse_str($params, $params); // converte a string em array
                foreach ($params as $key => $value) {
                    $type = (is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }
    protected function update(string $entity, array $data, string $terms, string $params): ?int{

        try {
            
            $dataset = [];
            foreach ($data as $bind => $value) {
                $dataset[] = "{$bind} = :{$bind}";
            }
            $dataset = implode(", ", $dataset);
            parse_str($params, $params);

            $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$dataset} WHERE {$terms}");
            $stmt->execute($this->filter(array_merge($data, $params)));
            return ($stmt->rowCount() ?? 1);

            // var_dump($dataset);
            // echo "UPDATE {$entity} SET {$dataset} WHERE {$terms}";
            // var_dump($params);
            // var_dump($stmt);
            // var_dump(array_merge($data, $params));
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }


        // echo "<pre>";
        // var_dump($entity, $data, $terms, $params);
        // echo "</pre>";
    }
    protected function delete(string $entity, string $terms, string $params): ?int{

        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");
            parse_str($params, $params);
            $stmt->execute($params);
            return ($stmt->rowCount() ?? 1);

        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }

        var_dump($entity, $terms, $params);
    }

    // vai elimiar os campos que não podem ser alterados
    protected function safe(): ?array
    {
        $safe = (array)$this->data();
        foreach (static::$safe as $unset) {
            unset($safe[$unset]);
        }
        return $safe;


        echo "<pre>";
        var_dump($safe);
        echo "</pre>";
    }

    // vai realizar a manutenção dos dados antes de salvar no banco de dados
    private function filter(array $data) : ?array
    {
        $filter = [];
        foreach ($data as $key => $value) {
           $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        return $filter;
        // echo '<pre>';
        // print_r($filter);
        // echo '</pre>';
    }
}
