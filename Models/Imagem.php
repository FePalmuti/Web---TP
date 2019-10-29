<?php
    class Imagem {
        private $arquivo;
        private $grau;
        private $num_pergunta;
        private $id_teste;

        public function Imagem($arquivo, $grau, $num_pergunta, $id_teste) {
            $this->arquivo = $arquivo;
            $this->grau = $grau;
            $this->num_pergunta = $num_pergunta;
            $this->id_teste = $id_teste;
        }

        public function getArquivo() {
            return $this->arquivo;
        }

        public function getGrau() {
            return $this->grau;
        }

        public function getNumPergunta() {
            return $this->num_pergunta;
        }

        public function getIdTeste() {
            return $this->id_teste;
        }

        public function setArquivo($novo_arquivo) {
            $this->arquivo = $novo_arquivo;
        }
    }
?>
