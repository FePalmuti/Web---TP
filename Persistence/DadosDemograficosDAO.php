<?php
    class DadosDemograficosDAO {
        public function cadastrar($linkConexao, $dados_demograficos) {
            $consulta = "INSERT INTO DadosDemograficos VALUES (\"".$dados_demograficos->getEmail()."\", \"".$dados_demograficos->getTelefone()."\", \"".$dados_demograficos->getIdade()."\", \"".$dados_demograficos->getSexo()."\", \"".$dados_demograficos->getCep()."\", \"".$dados_demograficos->getEtnia()."\", \"".$dados_demograficos->getIdRespostaTeste()."\");";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            return True;
        }

        public function buscar($linkConexao, $id_resposta_teste) {
            $consulta = "SELECT * FROM DadosDemograficos WHERE id_resposta_teste=\"".$id_resposta_teste."\";";
            $result = mysqli_query($linkConexao, $consulta);
            if(! $result) {
                return False;
            }
            while($linha = mysqli_fetch_object($result)) {
                $dados_demograficos = new DadosDemograficos($linha->email, $linha->telefone, $linha->idade, $linha->sexo, $linha->cep, $linha->etnia, $linha->id_resposta_teste);
                return $dados_demograficos;
            }
        }
    }
?>
