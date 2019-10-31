<?php
    require_once "Alternativa.php";

    class AlternativaDAO {
        public function cadastrar($linkConexao, $alternativa) {
            $consulta = "INSERT INTO Alternativa VALUES (\"".$alternativa->getArquivoImagem()."\", \"".$alternativa->getGrau()."\", \"".$alternativa->getNumPergunta()."\", \"".$alternativa->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscar($linkConexao, $num_pergunta, $id_teste) {
            $consulta = "SELECT * FROM Alternativa WHERE num_pergunta=\"".$num_pergunta."\" AND id_teste=\"".$id_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_alternativas = array();
            while($linha = mysqli_fetch_object($result)) {
                $alternativa = new Alternativa($linha->arquivo_imagem, $linha->grau, $linha->num_pergunta, $linha->id_teste);
                array_push($lista_alternativas, $alternativa);
            }
            return $lista_alternativas;
        }
    }
?>
