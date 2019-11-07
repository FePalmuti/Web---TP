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
