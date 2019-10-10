<?php
    require_once "Teste.php";
    require_once "../../Utilidades.php";

    class TesteDAO {
        public function cadastrar($linkConexao, $teste_incompleto) {
            $consulta = "INSERT INTO Pesquisador (codigo_acesso, nome, descricao, id_pesquisador)
                    VALUES (\"".$teste_incompleto.getNome()."\", \"".$teste_incompleto.getDescricao()."\", \"".$teste_incompleto.getIdPesquisador()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return $this->buscar($linkConexao, $nome, $senha);
        }

        public function buscar($linkConexao, $id_pesquisador) {
            $consulta = "SELECT * FROM Teste WHERE id_pesquisador=\"".$id_pesquisador."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            $lista_testes = array();
            while($linha = mysqli_fetch_object($result)) {
                $teste = new Teste($linha->id, $linha->codigo_acesso, $linha->nome, $linha->descricao, $linha->id_pesquisador);
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
