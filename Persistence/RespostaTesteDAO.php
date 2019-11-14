<?php
    class RespostaTesteDAO {
        public function cadastrar($linkConexao, $resposta_teste) {
            $consulta = "INSERT INTO RespostaTeste VALUES (\"".$resposta_teste->getId()."\", \"".$resposta_teste->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            // Cadastro dos dados demograficos
            //--------------------
            $dadosDemograficosDAO = new DadosDemograficosDAO();
            $retornos = $dadosDemograficosDAO->cadastrar($linkConexao, $resposta_teste->getDadosDemograficos());
            if($retornos[0] == null) {
                return $retornos;
            }
            //--------------------
            // Cadastro das respostas perguntas da resposta teste
            //--------------------
            $respostaPerguntaDAO = new RespostaPerguntaDAO();
            foreach($resposta_teste->getListaRespostaPergunta() as $resposta_pergunta) {
                $retornos = $respostaPerguntaDAO->cadastrar($linkConexao, $resposta_pergunta);
                if($retornos[0] == null) {
                    return $retornos;
                }
            }
            //--------------------
            return array(True, "", "");
        }

        public function buscar($linkConexao, $id_teste) {
            $consulta = "SELECT * FROM RespostaTeste WHERE id_teste=\"".$id_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            $lista_resposta_teste = array();
            // Monta cada objeto resposta
            while($resposta_teste = mysqli_fetch_object($result)) {
                // Busca os dados demograficos relacionados a resposta-teste
                //--------------------
                $dadosDemograficosDAO = new DadosDemograficosDAO();
                $retornos = $dadosDemograficosDAO->buscar($linkConexao, $resposta_teste->id);
                if($retornos[0] == null) {
                    return $retornos;
                }
                else {
                    $dados_demograficos = $retornos[0];
                }
                //--------------------
                // Busca as respostas-perguntas da resposta-teste
                //--------------------
                $respostaPerguntaDAO = new RespostaPerguntaDAO();
                $retornos = $respostaPerguntaDAO->buscar($linkConexao, $resposta_teste->id);
                if($retornos[0] == null) {
                    $lista_resposta_pergunta = array();
                }
                else {
                    $lista_resposta_pergunta = $retornos[0];
                }
                //--------------------
                $resposta_teste = new RespostaTeste($resposta_teste->id, $dados_demograficos, $lista_resposta_pergunta, $id_teste);
                array_push($lista_resposta_teste, $resposta_teste);
            }
            return array($lista_resposta_teste, "", "");
        }

        public function quantidadeRespostasTestes($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM RespostaTeste;";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return array(null, mysqli_errno($linkConexao), mysqli_error($linkConexao));
            }
            while($linha = mysqli_fetch_object($result)) {
                return array($linha->qnt, "", "");
            }
        }
    }
?>
