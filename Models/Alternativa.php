<?php
    class Alternativa {
        private $arquivo_imagem;
        private $grau;
        private $num_pergunta;
        private $id_teste;

        public function Alternativa($arquivo_imagem, $grau, $num_pergunta, $id_teste) {
            $this->arquivo_imagem = $arquivo_imagem;
            $this->grau = $grau;
            $this->num_pergunta = $num_pergunta;
            $this->id_teste = $id_teste;
        }

        public function getArquivoImagem() {
            return $this->arquivo_imagem;
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

        public function setArquivoImagem($novo_arq_imagem) {
            $this->arquivo_imagem = $novo_arq_imagem;
        }
    }
?>
