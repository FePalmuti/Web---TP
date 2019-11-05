<?php
    require_once "RespostaTeste.php";

    class RespostaTesteDAO {
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
