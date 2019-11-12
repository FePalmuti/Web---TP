<?php
    require_once "Imagem.php";

    class ImagemDAO {
        public function cadastrar($linkConexao, $imagem) {
            // Grava a imagem
            $consulta = "INSERT INTO Imagem VALUES (\"".$imagem->getId()."\", \"".$imagem->getArquivo()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            // Grava a tag
            $consulta = "INSERT INTO Tag VALUES (\"".$imagem->getTag()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            // Nao faz diferenca o erro, pois significa que ela ja existe...
            //
            // Grava relacao tag-imagem
            $consulta = "INSERT INTO Relacao_Tag_Imagem VALUES (\"".$imagem->getTag()."\", \"".$imagem->getId()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }

            return True;
        }

        public function buscarTodas($linkConexao) {
            $consulta = "SELECT * FROM Imagem;";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_imagens = array();
            while($linha_imagem = mysqli_fetch_object($result)) {
                //--------------------
                // Obtem tag relacionada
                $consulta = "SELECT * FROM Relacao_Tag_Imagem;";
                $result = mysqli_query($linkConexao, $consulta);
                if(! $result) {
                    return False;
                }
                while($linha_tag = mysqli_fetch_object($result)) {
                    $tag = $linha_tag->tag;
                }
                //--------------------
                $imagem = new Imagem($linha_imagem->id, $linha_imagem->arquivo, $tag);
                array_push($lista_imagens, $imagem);
            }
            return $lista_imagens;
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
