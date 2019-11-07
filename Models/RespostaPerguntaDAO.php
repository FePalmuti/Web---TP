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
    }
?>
