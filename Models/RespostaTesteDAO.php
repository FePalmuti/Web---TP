<?php
    require_once "RespostaTeste.php";
    require_once "DadosDemograficosDAO.php";
    require_once "RespostaPerguntaDAO.php";

    class RespostaTesteDAO {
        public function cadastrar($linkConexao, $resposta_teste) {
            $consulta = "INSERT INTO RespostaTeste VALUES (\"".$resposta_teste->getId()."\", \"".$resposta_teste->getIdTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            // Cadastro dos dados demograficos
            //--------------------
            $dadosDemograficosDAO = new DadosDemograficosDAO();
            $result = $dadosDemograficosDAO->cadastrar($linkConexao, $resposta_teste->getDadosDemograficos());
            if(! $result) {
                return False;
            }
            //--------------------
            // Cadastro das respostas perguntas da resposta teste
            //--------------------
            $respostaPerguntaDAO = new RespostaPerguntaDAO();
            foreach($resposta_teste->getListaRespostaPergunta() as $resposta_pergunta) {
                $result = $respostaPerguntaDAO->cadastrar($linkConexao, $resposta_pergunta);
                if(! $result) {
                    return False;
                }
            }
            //--------------------
            return True;
        }

        public function buscar($linkConexao, $id_teste) {
            $consulta = "SELECT * FROM RespostaTeste WHERE id_teste=\"".$id_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_resposta_teste = array();
            // Monta cada objeto resposta
            while($resposta_teste = mysqli_fetch_object($result)) {
                // Busca os dados demograficos relacionados a resposta-teste
                //--------------------
                $dadosDemograficosDAO = new DadosDemograficosDAO();
                $dados_demograficos = $dadosDemograficosDAO->buscar($linkConexao, $resposta_teste->id);
                if(! $dados_demograficos) {
                    return False;
                }
                //--------------------
                // Busca as respostas-perguntas da resposta-teste
                //--------------------
                $respostaPerguntaDAO = new RespostaPerguntaDAO();
                $lista_resposta_pergunta = $respostaPerguntaDAO->buscar($linkConexao, $resposta_teste->id);
                if(! $lista_resposta_pergunta) {
                    $lista_resposta_pergunta = array();
                }
                //--------------------
                $resposta_teste = new RespostaTeste($resposta_teste->id, $dados_demograficos, $lista_resposta_pergunta, $id_teste);
                array_push($lista_resposta_teste, $resposta_teste);
            }
            return $lista_resposta_teste;
        }

        public function quantidadeRespostasTestes($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM RespostaTeste;";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            while($linha = mysqli_fetch_object($result)) {
                return $linha->qnt;
            }
        }
    }
?>
