<?php
    require_once "Teste.php";

    class TesteDAO {
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
    }
?>
