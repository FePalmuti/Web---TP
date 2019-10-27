<?php
    require_once "Teste.php";
    require_once "PerguntaDAO.php";
    require_once "../../Utilidades.php";

    class TesteDAO {
        public function cadastrar($linkConexao, $teste) {
            $consulta = "INSERT INTO Teste VALUES (\"".$teste->getId()."\", \"".$teste->getCodigoAcesso()."\", \"".$teste->getNome()."\", \"".$teste->getDescricao()."\", \"".$teste->getIdPesquisador()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscar($linkConexao, $id_pesquisador) {
            $consulta = "SELECT * FROM Teste WHERE id_pesquisador=\"".$id_pesquisador."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_testes = array();
            // Monta cada objeto teste
            while($teste = mysqli_fetch_object($result)) {
                // Busca as perguntas do teste
                //--------------------
                $perguntaDAO = new PerguntaDAO();
                $lista_perguntas = $perguntaDAO->buscar($linkConexao, $teste->id);
                if(! $lista_perguntas) {
                    $lista_perguntas = array();
                }
                //--------------------
                $teste = new Teste($teste->id, $teste->codigo_acesso, $teste->nome, $teste->descricao, $teste->id_pesquisador, $lista_perguntas);
                array_push($lista_testes, $teste);
            }
            return $lista_testes;
        }

        public function quantidadeTestes($linkConexao) {
            $consulta = "SELECT COUNT(id) AS qnt FROM Teste;";
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
