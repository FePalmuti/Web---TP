<?php
    require_once "DadosDemograficos.php";

    class DadosDemograficosDAO {
        public function cadastrar($linkConexao, $dados_demograficos) {
            $consulta = "INSERT INTO DadosDemograficos VALUES (\"".$dados_demograficos->getEmail()."\", \"".$dados_demograficos->getTelefone()."\", \"".$dados_demograficos->getIdade()."\", \"".$dados_demograficos->getSexo()."\", \"".$dados_demograficos->getCep()."\", \"".$dados_demograficos->getEtnia()."\", \"".$dados_demograficos->getIdRespostaTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }
    }
?>
