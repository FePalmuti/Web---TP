<?php
	class Conexao {
		var $servidor;
		var $usuario;
		var $senha;
		var $bd;
		var $link;

		public function Conexao() {
			$this->servidor = "192.168.108.56";
			$this->usuario = "root";
			$this->senha = "";
			$this->bd = "Dados";
		}

		public function conectar() {
			$this->link = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);
			if(! $this->link) {
				return False;
			}
            return True;
		}

		public function getLink() {
			return $this->link;
		}
	}
?>
