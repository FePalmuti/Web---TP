<?php
    require_once "RespostaPergunta.php";

    class RespostaPerguntaDAO {
        public function cadastrar($linkConexao, $resposta_pergunta) {
            $consulta = "INSERT INTO RespostaPergunta VALUES (\"".$resposta_pergunta->getEntradaParticipante()."\", \"".$resposta_pergunta->getGrauEscolhido()."\", \"".$resposta_pergunta->getNumeroPergunta()."\", \"".$resposta_pergunta->getIdRespostaTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscar($linkConexao, $id_resposta_teste) {
            $consulta = "SELECT * FROM RespostaPergunta WHERE id_resposta_teste=\"".$id_resposta_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_resposta_pergunta = array();
            while($linha = mysqli_fetch_object($result)) {
                $resposta_pergunta = new RespostaPergunta($linha->entrada_participante, $linha->grau_escolhido, $linha->numero_pergunta, $linha->id_resposta_teste);
                array_push($lista_resposta_pergunta, $resposta_pergunta);
            }
            return $lista_resposta_pergunta;
        }
    }
?>
