<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class AccountSaving extends Account
{

    private $interest;

    public function __construct($branch, $account, User $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }
	public function deposit($value)
	{
		$this->balance = $value + ($value * $this->interest);
        Trigger::show("Depósito: {$this->toBrl($value)} realizado com sucesso!", Trigger::ACCEPT);
	}

	public function withdrawal($value)
	{
        if($this->balance >= $value){
            $this->balance -= $value;
            Trigger::show("Saque: {$this->toBrl($value)} realizado com sucesso!", Trigger::ERROR);
        }else{
            Trigger::show("Saldo insuficiente. Saldo atual: {$this->toBrl($this->balance)}.", Trigger::WARNING );
        }
	}
}