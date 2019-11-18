<?php
    class RespostaTeste {
        private $id;
        private $dados_demograficos;
        private $lista_resposta_pergunta;
        private $id_teste;

        public function RespostaTeste($id, $dados_demograficos, $lista_resposta_pergunta, $id_teste) {
            $this->id = $id;
            $this->dados_demograficos = $dados_demograficos;
            $this->lista_resposta_pergunta = $lista_resposta_pergunta;
            $this->id_teste = $id_teste;
        }

        public function getId() {
            return $this->id;
        }

        public function getDadosDemograficos() {
            return $this->dados_demograficos;
        }

        public function getListaRespostaPergunta() {
            return $this->lista_resposta_pergunta;
        }

        public function getIdTeste() {
            return $this->id_teste;
        }

        public function adicionarRespostaPergunta($resposta_pergunta) {
            array_push($this->lista_resposta_pergunta, $resposta_pergunta);
        }
    }
?>
