<?php
    require_once "Pergunta.php";
    require_once "ImagemDAO.php";

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
            $lista_perguntas = array();
            // Monta cada objeto pergunta
            while($pergunta = mysqli_fetch_object($result)) {
                // Busca as imagens da pergunta
                //--------------------
                $imagemDAO = new ImagemDAO();
                $lista_imagens = $imagemDAO->buscar($linkConexao, $pergunta->numero, $id_teste);
                if(! $lista_imagens) {
                    $lista_imagens = array();
                }
                //--------------------
                $pergunta = new Pergunta($pergunta->numero, $pergunta->instrucoes, $pergunta->descricao, $pergunta->tipo, $pergunta->id_teste, $lista_imagens);
                array_push($lista_perguntas, $pergunta);
            }
            return $lista_perguntas;
        }
    }
?>
