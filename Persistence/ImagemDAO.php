<?php
    class ImagemDAO {
        public function cadastrar($linkConexao, $imagem) {
            // Grava a imagem
            $consulta = "INSERT INTO Imagem VALUES (\"".$imagem->getId()."\", \"".$imagem->getArquivo()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
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
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }

            return array(True, "", "");
        }

        public function buscarTodas($linkConexao) {
            $consulta = "SELECT * FROM Imagem;";
            $result_img = mysqli_query($linkConexao, $consulta);
            if(! $result_img) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            $lista_imagens = array();
            while($linha_imagem = mysqli_fetch_object($result_img)) {
                //--------------------
                // Obtem tag relacionada
                $consulta = "SELECT * FROM Relacao_Tag_Imagem WHERE id_imagem = \"".$linha_imagem->id."\";";
                $result_tag = mysqli_query($linkConexao, $consulta);
                if(! $result_tag) {
                    return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
                }
                while($linha_tag = mysqli_fetch_object($result_tag)) {
                    $tag = $linha_tag->tag;
                }
                //--------------------
                $imagem = new Imagem($linha_imagem->id, $linha_imagem->arquivo, $tag);
                array_push($lista_imagens, $imagem);
            }
            return array($lista_imagens, "", "");
        }

        public function quantidadeImagens($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM Imagem;";
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
