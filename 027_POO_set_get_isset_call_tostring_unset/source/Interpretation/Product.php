<?php

namespace Source\Interpretation;

class Product
{
   public $name;
   private $price;
   private $data;

   // __set é chamado sempre que uma propriedade está inacessível(não existe).
   public function __set($name, $value){
      $this->notFound(__FUNCTION__, $name);
      $this->data[$name] = $value;
   }

   // __get é chamado sempre que uma propriedade está inacessível(não existe).
   public function __get($name){
      if(!empty($this->data[$name])){
         return $this->data[$name];
      }else{
         $this->notFound(__FUNCTION__, $name);
      }
   }

   // __isset é chamado sempre que uma propriedade está inacessível(não existe).
   // __isset é chamado automaticamente quando utilizamos a função isset() / empty() em uma propriedade inacessível.
   public function __isset($name){
      $this->notFound(__FUNCTION__, $name);
   }

   // __call é chamado sempre que um método está inacessível(não existe).
   public function __call($name, $arguments){
      $this->notFound(__FUNCTION__, $name);
      var_dump($arguments);
   }

   // __toString é chamado sempre que um objeto é convertido para string.
   public function __toString(){
      return "<p class='alert alert-warning'>Este é um objeto da classe " . __CLASS__ . "</p>";
   }

   // __unset é chamado sempre que uma propriedade está inacessível(não existe).
   public function __unset($name){
      trigger_error(__FUNCTION__ . ": Acesso negado à propriedade {$name}", E_USER_ERROR);
   }

   public function handler(string $name, float $price)
   {
      $this->name = $name;
      $this->price = number_format($price, 2, '.', ',');
   }

   private function notFound($method, $name){
        echo "<p class='alert alert-danger'>{$method}: A propriedade  {$name} não existe em " . __CLASS__ . "!</p>";
   }

}