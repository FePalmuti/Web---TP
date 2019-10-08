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

        public function getSenha() {
            return $this->senha;
        }
    }
?>
