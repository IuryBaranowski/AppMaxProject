<?php
require_once "Modelo/renegado.class.php";
require_once "modelo/conexaobanco.class.php";

class RenegadoDAO
{

    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstance();
    }

    public function cadastrarRenegado($renegado)
    {
        try
        {
            $statement = $this
                ->conexao
                ->prepare("insert into renegado(idrenegado,nome,idade,graduacao,sexo,cla,vila)values(null,?,?,?,?,?,?)");

            $statement->bindValue(1, $renegado->nome);
            $statement->bindValue(2, $renegado->idade);
            $statement->bindValue(3, $renegado->graduacao);
            $statement->bindValue(4, $renegado->sexo);
            $statement->bindValue(5, $renegado->cla);
            $statement->bindValue(6, $renegado->vila);
            $statement->execute();

        }
        catch(PDOException $error)
        {
            echo "Erro ao cadastrar" . $error;
        }
    }

    public function buscarRenegado()
    {
        try
        {
            $statement = $this
                ->conexao
                ->query("select * from renegado");
            $array = $statement->fetchAll(PDO::FETCH_CLASS, 'renegado');
            return $array;
        }
        catch(PDOException $error)
        {
            echo "Erro ao buscar renegado!" . $error;
        }
    }

    public function excluirRenegado($id)
    {
        try
        {
            $statement = $this
                ->conexao
                ->prepare("delete from renegado where idrenegado = ?");
            $statement->bindValue(1, $id);
            $statement->execute();
        }
        catch(PDOException $error)
        {
            echo "Erro ao excluir renegado" . $error;
        }
    }

    public function filtrarRenegado($filtro, $pesquisa)
    {
        try
        {
            switch ($filtro)
            {
                case "id":
                    $query = "where idrenegado like '%{$pesquisa}%'";
                break;
                case "nome":
                    $query = "where nome like '%{$pesquisa}%'";
                break;
                case "idade":
                    $query = "where idade like '%{$pesquisa}%'";
                break;
                case "graduacao":
                    $query = "where graduacao like '%{$pesquisa}%'";
                break;
                case "sexo":
                    $query = "where sexo like '%{$pesquisa}%'";
                break;
                case "cla":
                    $query = "where cla like '%{$pesquisa}%'";
                break;
                case "vila":
                    $query = "where vila like '%{$pesquisa}%'";
                break;
                default:
                    $query = "";
                break;
            }
            $statement = $this
                ->conexao
                ->query("select * from renegado {$query}");
            return $statement->fetchAll(PDO::FETCH_CLASS, 'renegado');
        }
        catch(PDOException $error)
        {
            echo "erro ao filtrar renegado" . $error;
        }
    }

    public function alterarRenegado($renegado)
    {
        try
        {
            $statement = $this
                ->conexao
                ->prepare("update renegado set nome=?,idade=?,graduacao=?,sexo=?,cla=?,vila=? where idrenegado=?");

            $statement->bindValue(1, $renegado->nome);
            $statement->bindValue(2, $renegado->idade);
            $statement->bindValue(3, $renegado->graduacao);
            $statement->bindValue(4, $renegado->sexo);
            $statement->bindValue(5, $renegado->cla);
            $statement->bindValue(6, $renegado->vila);
            $statement->bindValue(7, $renegado->idRenegado);
            $statement->execute();
        }
        catch(PDOException $error)
        {
            echo "Erro ao alterar renegado!" . $error;
        }
    }
}
