<?php
  require_once "Modelo/usuario.class.php";
  require_once "modelo/conexaobanco.class.php";

  class UsuarioDAO
  {

    private $conexao = null;

    public function __construct() {
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function cadastrarUsuario($usuario)
    {
      try {
        $statement = $this->conexao->prepare("insert into shinobis(idUsuario,nome,idade,graduacao,sexo,cla)values(null,?,?,?,?,?)");

        $statement->bindValue(1,$usuario->nome);
        $statement->bindValue(2,$usuario->idade);
        $statement->bindValue(3,$usuario->graduacao);
        $statement->bindValue(4,$usuario->sexo);
        $statement->bindValue(5,$usuario->cla);
        $statement->execute();

      } catch(PDOException $error) {
        echo "Erro ao cadastrar". $error;
      }
    }

    public function buscarUsuario()
    {
      try{
        $statement = $this->conexao->query("select * from shinobis");
        $array = $statement->fetchAll(PDO::FETCH_CLASS,'Usuario');
        return $array;
      } catch(PDOException $error) {
        echo "Erro ao buscar Shinobi!".$error;
      }
    }

    public function excluirNinja($id)
    {
      try{
        $statement = $this->conexao->prepare("delete from shinobis where idusuario = ?");
        $statement->bindValue(1, $id);
        $statement->execute();
      } catch(PDOException $error){
          echo "Erro ao excluir ninja".$error;
        }
      }

      public function filtrarNinja($filtro, $pesquisa)
      {
        try{
          switch($filtro){
            case "id": $query = "where idusuario like '%{$pesquisa}%'";
            break;
            case "nome": $query = "where nome like '%{$pesquisa}%'";
            break;
            case "idade": $query = "where idade like '%{$pesquisa}%'";
            break;
            case "graduacao": $query = "where graduacao like '%{$pesquisa}%'";
            break;
            case "sexo": $query = "where sexo like '%{$pesquisa}%'";
            break;
            case "cla": $query = "where cla like '%{$pesquisa}%'";
            break;
            default: $query = "";
            break;
            }
            $statement = $this->conexao->query("select * from shinobis {$query}");
            return $statement -> fetchAll(PDO::FETCH_CLASS,'Usuario');
          } catch(PDOException $error){
            echo "erro ao filtrar ninja".$error;
          }
        }

        public function alterarNinja($usuario)
        {
          try{
            $statement = $this->conexao->prepare("update shinobis set nome=?,idade=?,graduacao=?,sexo=?,cla=? where idusuario=?");

            $statement->bindValue(1, $usuario->nome);
            $statement->bindValue(2, $usuario->idade);
            $statement->bindValue(3, $usuario->graduacao);
            $statement->bindValue(4, $usuario->sexo);
            $statement->bindValue(5, $usuario->cla);
            $statement->bindValue(6, $usuario->idUsuario);
            $statement->execute();
          } catch(PDOException $error){
            echo "Erro ao alterar ninja!".$error;
          }
        }
      }
