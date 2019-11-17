<?php
    require_once "Pesquisador.php";

    class PesquisadorDAO {
        public function cadastrar($linkConexao, $pesquisador) {
            $consulta = "INSERT INTO Pesquisador VALUES (\"".$pesquisador->getId()."\", \"".$pesquisador->getNome()."\", \"".$pesquisador->getSenha()."\", \"".$pesquisador->getAdm()."\");";
            $result = mysqli_query($linkConexao, $consulta) or die(mysqli_error($linkConexao));
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscar($linkConexao, $nome, $senha) {
            $consulta = "SELECT * FROM Pesquisador WHERE nome=\"".$nome."\" AND senha=\"".$senha."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            while($linha = mysqli_fetch_object($result)) {
                $pesquisador = new Pesquisador($linha->id, $linha->nome, $linha->senha, $linha->adm);
                return $pesquisador;
            }
        }

        public function quantidadePesquisadores($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM Pesquisador;";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            while($linha = mysqli_fetch_object($result)) {
                return $linha->qnt;
            }
        }
    }
?>
