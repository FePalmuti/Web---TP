<?php
    require_once "Imagem.php";

    class ImagemDAO {
        public function cadastrar($linkConexao, $imagem) {
            $consulta = "INSERT INTO Imagem VALUES (\"".$imagem->getId()."\", \"".$imagem->getArquivo()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscarTodas($linkConexao, $id) {
            $consulta = "SELECT * FROM Imagem;";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            while($linha = mysqli_fetch_object($result)) {
                $imagem = new Imagem($linha->id, $linha->arquivo);
                return $imagem;
            }
        }

        public function quantidadeImagens($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM Imagem;";
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
