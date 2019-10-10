<?php
    require_once "Pergunta.php";

    class PerguntaDAO {
        public function cadastrar($linkConexao, $pergunta) {
            $consulta = "INSERT INTO Pergunta VALUES (\"".$pergunta->getNumero()."\", \"".$pergunta->getInstrucoes()."\", \"".$pergunta->getDescricao()."\", \"".$pergunta->getTipo()."\", \"".$pergunta->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }
    }
?>
