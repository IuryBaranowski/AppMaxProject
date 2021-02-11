<?php

class Renegado{

  private $idRenegado;
  private $nome;
  private $idade;
  private $graduacao;
  private $sexo;
  private $vila;

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
    return nl2br("Nome: $this->nome
                 Idade: $this->idade
                 Graduação: $this->graduacao
                 Sexo: $this->sexo
                 Vila: $this->vila");
  }
}
