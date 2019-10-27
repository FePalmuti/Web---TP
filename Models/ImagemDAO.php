<?php
    require_once "Imagem.php";

    class ImagemDAO {
        public function cadastrar($linkConexao, $imagem) {
            $consulta = "INSERT INTO Imagem VALUES (\"".$imagem->getArquivo()."\", \"".$imagem->getGrau()."\", \"".$imagem->getNumPergunta()."\", \"".$imagem->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscar($linkConexao, $num_pergunta, $id_teste) {
            $consulta = "SELECT * FROM Imagem WHERE num_pergunta=\"".$num_pergunta."\" AND id_teste=\"".$id_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_imagens = array();
            while($linha = mysqli_fetch_object($result)) {
                $imagem = new Imagem($linha->arquivo, $linha->grau, $linha->num_pergunta, $linha->id_teste);
                array_push($lista_imagens, $imagem);
            }
            return $lista_imagens;
        }
    }
?>
