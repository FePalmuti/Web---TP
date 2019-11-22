<?php
    class TesteDAO {
        public function cadastrar($linkConexao, $teste) {
            $consulta = "INSERT INTO Teste VALUES (\"".$teste->getId()."\", \"".$teste->getCodigoAcesso()."\", \"".$teste->getNome()."\", \"".$teste->getDescricao()."\", \"".$teste->getIdPesquisador()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            // Cadastro das perguntas do teste
            //--------------------
            $perguntaDAO = new PerguntaDAO();
            foreach($teste->getListaPerguntas() as $pergunta) {
                $retornos = $perguntaDAO->cadastrar($linkConexao, $pergunta);
                if($retornos[0] == null) {
                    return $retornos;
                }
            }
            //--------------------
            return array(True, "", "");
        }

        public function buscar($linkConexao, $id_pesquisador) {
            $consulta = "SELECT * FROM Teste WHERE id_pesquisador=\"".$id_pesquisador."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            $lista_testes = array();
            // Monta cada objeto teste
            while($teste = mysqli_fetch_object($result)) {
                // Busca as perguntas do teste
                //--------------------
                $perguntaDAO = new PerguntaDAO();
                $retornos = $perguntaDAO->buscar($linkConexao, $teste->id);
                if($retornos[0] == null) {
                    $lista_perguntas = array();
                }
                else {
                    $lista_perguntas = $retornos[0];
                }
                //--------------------
                $teste = new Teste($teste->id, $teste->codigo_acesso, $teste->nome, $teste->descricao, $teste->id_pesquisador, $lista_perguntas);
                array_push($lista_testes, $teste);
            }
            return array($lista_testes, "", "");
        }

        public function buscarPorCA($linkConexao, $codigo_acesso) {
            $consulta = "SELECT * FROM Teste WHERE codigo_acesso=\"".$codigo_acesso."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            while($teste = mysqli_fetch_object($result)) {
                // Busca as perguntas do teste
                //--------------------
                $perguntaDAO = new PerguntaDAO();
                $retornos = $perguntaDAO->buscar($linkConexao, $teste->id);
                if($retornos[0] == null) {
                    $lista_perguntas = array();
                }
                else {
                    $lista_perguntas = $retornos[0];
                }
                //--------------------
                $teste = new Teste($teste->id, $teste->codigo_acesso, $teste->nome, $teste->descricao, $teste->id_pesquisador, $lista_perguntas);
                return array($teste, "", "");
            }
        }

        public function proximoId($linkConexao) {
            $consulta = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'Dados' AND TABLE_NAME = 'Teste';";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            $linha = mysqli_fetch_array($result, MYSQLI_ASSOC);
            return array($linha["AUTO_INCREMENT"], "", "");
        }
    }
?>
