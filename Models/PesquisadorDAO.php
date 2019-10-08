<?php
    require_once "Pesquisador.php";

    class PesquisadorDAO {
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

        public function cadastrar($linkConexao, $nome, $senha) {
            $consulta = "INSERT INTO Pesquisador (nome, senha) VALUES (\"".$nome."\", \"".$senha."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }
    }
?>
