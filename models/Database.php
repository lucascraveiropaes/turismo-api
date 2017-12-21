<?php
	mysqli_report(MYSQLI_REPORT_STRICT);

	class Database {
	    private $host = "localhost";
	    private $user = "root";
	    private $password = "";
	    private $name = "turismo_quissama";
	    private $conexao = null;

	    public function __construct()
	    {          
	        $this->openDB();
	    }

	    private function openDB() {
			try {
				$this->conexao = new mysqli($this->host, $this->user, $this->password, $this->name);
				$this->conexao->set_charset("utf8");
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		public function closeDB($conexao) {
			try {
				mysqli_close($conexao);
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function conexao() {
	        return $this->conexao;
		}
	}


?>