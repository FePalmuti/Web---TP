<?php
    class Pergunta {
        private $numero;
        private $instrucoes;
        private $descricao;
        private $sem_descricao;
        private $tipo;
        private $id_teste;
        private $lista_imagens;

        public function Pergunta($numero, $instrucoes, $descricao, $sem_descricao, $tipo, $id_teste, $lista_imagens) {
            $this->numero = $numero;
            $this->instrucoes = $instrucoes;
            $this->descricao = $descricao;
            $this->sem_descricao = $sem_descricao;
            $this->tipo = $tipo;
            $this->id_teste = $id_teste;
            $this->lista_imagens = $lista_imagens;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getInstrucoes() {
            return $this->instrucoes;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function semDescricao() {
            return $this->sem_descricao;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function getIdTeste() {
            return $this->id_teste;
        }

        public function getListaImagens() {
            return $this->lista_imagens;
        }

        public function setListaImagens($lista_imagens) {
            $this->lista_imagens = $lista_imagens;
        }
    }
?>
