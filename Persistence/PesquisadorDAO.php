<?php
    class PesquisadorDAO {
        public function cadastrar($linkConexao, $pesquisador) {
            $consulta = "INSERT INTO Pesquisador VALUES (\"".$pesquisador->getId()."\", \"".$pesquisador->getNome()."\", \"".$pesquisador->getSenha()."\", \"".$pesquisador->getAdm()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            return array(True, "", "");
        }

        public function buscar($linkConexao, $nome, $senha) {
            $consulta = "SELECT * FROM Pesquisador WHERE nome=\"".$nome."\" AND senha=\"".$senha."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            while($linha = mysqli_fetch_object($result)) {
                $pesquisador = new Pesquisador($linha->id, $linha->nome, $linha->senha, $linha->adm);
                return array($pesquisador, "", "");
            }
        }

        public function quantidadePesquisadores($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM Pesquisador;";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            while($linha = mysqli_fetch_object($result)) {
                return array($linha->qnt, "", "");
            }
        }
    }
?>
