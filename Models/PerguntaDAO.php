<?php
    require_once "Pergunta.php";
    require_once "Alternativa.php";
    require_once "AlternativaDAO.php";

    class PerguntaDAO {
        public function cadastrar($linkConexao, $pergunta) {
            $consulta = "INSERT INTO Pergunta VALUES (\"".$pergunta->getNumero()."\", \"".$pergunta->getInstrucoes()."\", \"".$pergunta->getDescricao()."\", \"".$pergunta->semDescricao()."\", \"".$pergunta->getTipo()."\", \"".$pergunta->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            // Cadastro das alternativas da pergunta
            //--------------------
            $alternativaDAO = new AlternativaDAO();
            foreach($pergunta->getListaAlternativas() as $alternativa) {
                $result = $alternativaDAO->cadastrar($linkConexao, $alternativa);
                if(! $result) {
                    return False;
                }
            }
            //--------------------
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
                // Busca as alternativas da pergunta
                //--------------------
                $alternativaDAO = new AlternativaDAO();
                $lista_alternativas = $alternativaDAO->buscar($linkConexao, $pergunta->numero, $id_teste);
                if(! $lista_alternativas) {
                    $lista_alternativas = array();
                }
                //--------------------
                $pergunta = new Pergunta($pergunta->numero, $pergunta->instrucoes, $pergunta->descricao, $pergunta->sem_descricao, $pergunta->tipo, $pergunta->id_teste, $lista_alternativas);
                array_push($lista_perguntas, $pergunta);
            }
            return $lista_perguntas;
        }
    }
?>
