<?php
    class Teste {
        private $id;
        private $codigo_acesso;
        private $nome;
        private $descricao;
        private $id_pesquisador;
        private $lista_perguntas;

        public function Teste($id, $codigo_acesso, $nome, $descricao, $id_pesquisador, $lista_perguntas) {
            $this->id = $id;
            $this->codigo_acesso = $codigo_acesso;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->id_pesquisador = $id_pesquisador;
            $this->lista_perguntas = $lista_perguntas;
        }

        public function getId() {
            return $this->id;
        }

        public function getCodigoAcesso() {
            return $this->codigo_acesso;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getIdPesquisador() {
            return $this->id_pesquisador;
        }

        public function getListaPerguntas() {
            return $this->lista_perguntas;
        }
    }
?>
