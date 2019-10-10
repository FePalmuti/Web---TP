<?php
    class Utilidades {
        public static function gerarCodigoDeAcesso($id) {
            $codigo_acesso = (String) $id;
            $codigo_acesso = $codigo_acesso."aaa";
            return $codigo_acesso;
        }
    }
?>
