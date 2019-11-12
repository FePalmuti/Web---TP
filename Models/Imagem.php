<?php
    class Imagem {
        private $id;
        private $arquivo;

        public function Imagem($id, $arquivo) {
            $this->id = $id;
            $this->arquivo = $arquivo;
        }

        public function getId() {
            return $this->id;
        }

        public function getArquivo() {
            return $this->arquivo;
        }
    }
?>
