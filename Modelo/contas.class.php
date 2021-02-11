<?php

class Contas
{

  private $idLogin;
  private $conta;
  private $senha;
  private $funcao;

  public function __construct()
  {

  }

  public function __destruct()
  {

  }

  public function __get($atributo)
  {
    return $this->$atributo;
  }

  public function __set($atributo, $valor)
  {
    $this->$atributo = $valor;
  }

  public function __toString(): string
  {
      return nl2br("Conta: $this->conta
                    Senha: $this->senha
                    Função: $this->funcao");
  }
}

 ?>
