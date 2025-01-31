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

    public function bootstrap(string $first_name, string $last_name, string $email, string $document = null): ?UserModel{
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->document = $document;

        return $this;

    }

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

    public function save() : ?UserModel{
        
        if(!$this->required()){
            return null;
        }

        // se existe o ID a gente atualiza
        /** @var User Update */
        if(!empty($this->id)){
            $userId = $this->id;
            $email = $this->read("SELECT id FROM users_2 WHERE email = :email AND id != :id", "email={$this->email}&id={$userId}"); 

            if($email->rowCount()){
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

            if($this->fail()){
                $this->message = "Erro ao atualizar, verifique os dados";
            }
            $this->message = "Cadastro atualizado com sucesso"; 
        }


        // se não existe o ID a gente cria um novo registro
        /** @var User Create */
        if(empty($this->id)){

            // verifica se o e-mail já existe
            if($this->find($this->email)){
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }
            $userId = $this->create(self::$entity, $this->safe());

            // se ocorreu um erro
            if($this->fail()){
                $this->message = "Erro ao cadastrar, verifique os dados";
            }
            $this->message = "Cadastro realizado com sucesso";
        }

        $this->data = $this->read("SELECT * FROM users_2 WHERE id = :id", "id={$userId}")->fetch();
        return $this;

    }

    public function destroy() : ?UserModel{
        if(!empty($this->id)){
            $this->delete(self::$entity, "id = :id", "id={$this->id}");
        }

        if($this->fail()){
            $this->message = "Não foi possível remover o usuário";
            return false;
        }
        $this->message = "Usuário removido com sucesso";
        $this->data = null;
        return $this;
    }

    private function required(): bool{
        // verifica se os campos obrigatórios estão preenchidos
        // valida os formatos dos campos

        if(empty($this->first_name) || empty($this->last_name) || empty($this->email)){
            $this->message = "Os campos nome, sobrenome e e-mail são obrigatórios";
            return false;
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail informado não é válido";
            return false;
        }
        return true;
    }
}