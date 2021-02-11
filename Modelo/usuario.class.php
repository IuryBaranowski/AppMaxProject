<?php

class Usuario{

  private $idUsuario;
  private $nome;
  private $idade;
  private $graduacao;
  private $sexo;
  private $cla;

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
    return nl2br("Ninja: $this->nome
                  Idade: $this->idade
                  Graduação: $this->graduacao
                  Sexo: $this->sexo
                  Clã: $this->cla
                  ID: $this->idUsuario");
  }
}
