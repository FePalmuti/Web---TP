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

        public function buscar($linkConexao, $id_teste) {
            $consulta = "SELECT * FROM Pergunta WHERE id_teste=\"".$id_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_pergunta = array();
            while($linha = mysqli_fetch_object($result)) {
                $pergunta = new Pergunta($linha->numero, $linha->instrucoes, $linha->descricao, $linha->tipo, $linha->id_teste);
                array_push($lista_pergunta, $pergunta);
            }
            return $lista_pergunta;
        }
    }
?>
