<?php
    class Pesquisador {
        private $id;
        private $nome;
        private $senha;
        private $adm;

        public function Pesquisador($id, $nome, $senha, $adm) {
            $this->id = $id;
            $this->nome = $nome;
            $this->senha = $senha;
            $this->adm = $adm;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function isAdm() {
            return $this->adm;
        }
    }
?>
