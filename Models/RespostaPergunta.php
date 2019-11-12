<?php
    class RespostaPergunta {
        private $entrada_participante;
        private $grau_escolhido;
        private $numero_pergunta;
        private $id_resposta_teste;

        public function RespostaPergunta($entrada_participante, $grau_escolhido, $numero_pergunta, $id_resposta_teste) {
            $this->entrada_participante = $entrada_participante;
            $this->grau_escolhido = $grau_escolhido;
            $this->numero_pergunta = $numero_pergunta;
            $this->id_resposta_teste = $id_resposta_teste;
        }

        public function getEntradaParticipante() {
            return $this->entrada_participante;
        }

        public function getGrauEscolhido() {
            return $this->grau_escolhido;
        }

        public function getNumeroPergunta() {
            return $this->numero_pergunta;
        }

        public function getIdRespostaTeste() {
            return $this->id_resposta_teste;
        }
    }
?>
