<?php
    class Utilidades {
        public static function gerarCodigoDeAcesso($id) {
            $codigo_acesso = (String) $id;
            $codigo_acesso = $codigo_acesso.Utilidades::stringAleatoria(3);
            return $codigo_acesso;
        }

        public static function stringAleatoria($tam) {
            $base = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $palavra = "";
            for($i=0; $i<$tam; $i++) {
                $palavra .= $base[rand(0, strlen($base) - 1)];
            }
            return $palavra;
        }
    }
?>
