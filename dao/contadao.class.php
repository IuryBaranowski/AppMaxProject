<?php
require_once "Modelo/conexaobanco.class.php";

class contaDAO
{
    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstance();
    }

    public function cadastrarContas($contas)
    {
        try
        {
            $statement = $this
                ->conexao
                ->prepare("insert into contas(idlogin,conta,senha,funcao)values(null,?,?,?)");

            $statement->bindValue(1, $contas->conta);
            $statement->bindValue(2, $contas->senha);
            $statement->bindValue(3, $contas->funcao);
            $statement->execute();
        }
        catch(PDOException $error)
        {
            echo "Erro ao cadastrar!" . $error;
        }
    }

    public function verificarConta($contas)
    {
        try
        {
            $statement = $this
                ->conexao
                ->prepare("select * from contas where conta=? and senha=? and funcao=?");

            $statement->bindValue(1, $contas->conta);
            $statement->bindValue(2, $contas->senha);
            $statement->bindValue(3, $contas->funcao);

            $statement->execute();

            $contaRetorno = null;
            $contaRetorno = $statement->fetchObject('contas');
            return $contaRetorno;
        }
        catch(PDOException $error)
        {
            echo "Erro ao verificar usuario!" . $error;
        }
    }
}
