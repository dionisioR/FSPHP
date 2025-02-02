<?php

namespace Source\Models;

class UserModel extends Model
{
    /**
     * @var array $safe no update and create
     */
    // campos que não podem ser atualizados ou criados
    protected static $safe = ["id", "created_at", "updated_at"];

    /**
     * @var string $entity database table
     */
    // tabela do banco de dados
    protected static $entity = "users_2";

    public function bootstrap(){}

    public function load(int $id, string $columns = "*") : ?UserModel{
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        
        // validando o $load
        // ou deu erro ou não encontrou o registro
        if($this->fail() || !$load->rowCount()){
            $this->message = "Usuário não encontrado para o ID informado";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    public function find($email, string $columns = "*"): ?UserModel{
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        
        // validando o $load
        // ou deu erro ou não encontrou o registro
        if($this->fail() || !$find->rowCount()){
            $this->message = "Usuário não encontrado para o e-mail informado";
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }

    public function all(int $limit = 10, int $offset = 0, string $columns = "*") : ?array{
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");
        
        // validando o $load
        // ou deu erro ou não encontrou o registro
        if($this->fail() || !$all->rowCount()){
            $this->message = "Sua consulta não retornou usuários";
            return null;
        }

        return $all->fetchAll( \PDO::FETCH_CLASS, __CLASS__);
    }

    public function save(){}

    public function destroy(){}

    private function required(){}
}