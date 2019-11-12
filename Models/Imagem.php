<?php
    class Imagem {
        private $id;
        private $arquivo;
        private $tag;

        public function Imagem($id, $arquivo, $tag) {
            $this->id = $id;
            $this->arquivo = $arquivo;
            $this->tag = $tag;
        }

        public function getId() {
            return $this->id;
        }

        public function getArquivo() {
            return $this->arquivo;
        }

        public function getTag() {
            return $this->tag;
        }
    }
?>
