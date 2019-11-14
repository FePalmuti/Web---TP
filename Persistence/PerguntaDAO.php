<?php
    class PerguntaDAO {
        public function cadastrar($linkConexao, $pergunta) {
            $consulta = "INSERT INTO Pergunta VALUES (\"".$pergunta->getNumero()."\", \"".$pergunta->getInstrucoes()."\", \"".$pergunta->getDescricao()."\", \"".$pergunta->getTipo()."\", \"".$pergunta->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            // Cadastro das alternativas da pergunta
            //--------------------
            $alternativaDAO = new AlternativaDAO();
            foreach($pergunta->getListaAlternativas() as $alternativa) {
                $retornos = $alternativaDAO->cadastrar($linkConexao, $alternativa);
                if($retornos[0] == null) {
                    return $retornos;
                }
            }
            //--------------------
            return array(True, "", "");
        }

        public function buscar($linkConexao, $id_teste) {
            $consulta = "SELECT * FROM Pergunta WHERE id_teste=\"".$id_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            $lista_perguntas = array();
            // Monta cada objeto pergunta
            while($pergunta = mysqli_fetch_object($result)) {
                // Busca as alternativas da pergunta
                //--------------------
                $alternativaDAO = new AlternativaDAO();
                $retornos = $alternativaDAO->buscar($linkConexao, $pergunta->numero, $id_teste);
                if($retornos[0] == null) {
                    $lista_alternativas = array();
                }
                else {
                    $lista_alternativas = $retornos[0];
                }
                //--------------------
                $pergunta = new Pergunta($pergunta->numero, $pergunta->instrucoes, $pergunta->descricao, $pergunta->tipo, $pergunta->id_teste, $lista_alternativas);
                array_push($lista_perguntas, $pergunta);
            }
            return array($lista_perguntas, "", "");
        }
    }
?>
