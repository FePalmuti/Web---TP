<?php
    class DadosDemograficos {
        private $email;
        private $telefone;
        private $idade;
        private $sexo;
        private $cep;
        private $etnia;
        private $id_resposta_teste;

        public function DadosDemograficos($email, $telefone, $idade, $sexo, $cep, $etnia, $id_resposta_teste) {
            $this->email = $email;
            $this->telefone = $telefone;
            $this->idade = $idade;
            $this->sexo = $sexo;
            $this->cep = $cep;
            $this->etnia = $etnia;
            $this->id_resposta_teste = $id_resposta_teste;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getIdade() {
            return $this->idade;
        }

        public function getSexo() {
            return $this->sexo;
        }

        public function getCep() {
            return $this->cep;
        }

        public function getEtnia() {
            return $this->etnia;
        }

        public function getIdRespostaTeste() {
            return $this->id_resposta_teste;
        }
    }
?>
