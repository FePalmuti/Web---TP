<?php
	class Conexao {
		var $servidor;
		var $usuario;
		var $senha;
		var $bd;
		var $link;

		function __construct($servidor, $usuario, $senha, $bd) {
			$this->servidor = $servidor;
			$this->usuario = $usuario;
			$this->senha = $senha;
			$this->bd = $bd;
		}

		function conectar() {
			$this->link = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);
			if(! $this->link) {
				return False;
			}
            return True;
		}

		function fechar() {
			mysqli_close($this->link);
		}

		function getLink() {
			return $this->link;
		}
	}
?>
