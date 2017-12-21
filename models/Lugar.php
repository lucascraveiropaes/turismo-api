<?php
	/**
	* 
	*/
	class Lugar
	{
		private $id;
		private $nome;
		private $descricao;
		private $espaco;
		private $simbolo;
		private $latitude;
		private $longitude;
		private $circuito_id;
		private $funcionamento_inicio;
		private $funcionamento_fim;
		private $endereco;
		
		public function getId()
		{
		    return $this->id;
		}
		public function setId($id)
		{
		    return $this->id = $id;
		}

		public function getNome()
		{
		    return $this->nome;
		}
		public function setNome($nome)
		{
		    return $this->nome = $nome;
		}

		public function getDescricao()
		{
		    return $this->descricao;
		}
		public function setDescricao($descricao)
		{
		    return $this->descricao = $descricao;
		}

		public function getEspaco()
		{
		    return $this->espaco;
		}
		public function setEspaco($espaco)
		{
		    return $this->espaco = $espaco;
		}

		public function getSimbolo_id()
		{
		    return $this->simbolo_id;
		}
		public function setSimbolo_id($simbolo_id)
		{
		    return $this->simbolo_id = $simbolo_id;
		}

		public function getLatitude()
		{
		    return $this->latitude;
		}
		public function setLatitude($latitude)
		{
		    return $this->latitude = $latitude;
		}
		public function getLongitude()
		{
		    return $this->longitude;
		}
		public function setLongitude($longitude)
		{
		    return $this->longitude = $longitude;
		}

		public function getCircuito_id()
		{
		    return $this->circuito_id;
		}
		public function setCircuito_id($circuito_id)
		{
		    return $this->circuito_id = $circuito_id;
		}

		public function getFuncionamento_inicio()
		{
		    return $this->funcionamento_inicio;
		}
		public function setFuncionamento_inicio($funcionamento_inicio)
		{
		    return $this->funcionamento_inicio = $funcionamento_inicio;
		}

		public function getFuncionamento_fim()
		{
		    return $this->funcionamento_fim;
		}
		public function setFuncionamento_fim($funcionamento_fim)
		{
		    return $this->funcionamento_fim = $funcionamento_fim;
		}

		public function getEndereco()
		{
		    return $this->endereco;
		}
		public function setEndereco($endereco)
		{
		    return $this->endereco = $endereco;
		}

		/* CRUD Functions */

		public function listar() {
			$db = getDB();

			$sql = "SELECT * FROM lugar";

			$result = $db->query($sql);
			$lugares = $result->fetch_all(MYSQLI_ASSOC);

			if($lugares){
			    return $lugares;
	    	}
	    	else {
	    		return null;
	    	}
		}
	}
?>