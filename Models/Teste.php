<?php
    class Teste {
        private $id;
        private $codigo_acesso;
        private $nome;
        private $descricao;
        private $id_pesquisador;

        public function Teste($id, $codigo_acesso, $nome, $descricao, $id_pesquisador) {
            $this->id = $id;
            $this->codigo_acesso = $codigo_acesso;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->id_pesquisador = $id_pesquisador;
        }

        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }
    }
?>
