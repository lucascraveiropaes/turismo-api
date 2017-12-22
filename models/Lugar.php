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
		private $endereco;
		private $simbolo;
		private $latitude;
		private $longitude;
		private $circuito_id;
		private $funcionamento_inicio;
		private $funcionamento_fim;
		
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

			$imagem = new Imagem();

			$sql = "SELECT * FROM lugar";

			$result = $db->query($sql);
			$lugares = $result->fetch_all(MYSQLI_ASSOC);

			for ($i=0; $i<count($lugares); $i++) {
				$array = array(
					'categoria' => 1,
					'imagem_id' => $lugares[$i]["id"]
				);

				$lugares[$i]["imagens"] = $imagem->listar($array);
			}
				
			if($lugares){
			    return $lugares;
	    	}
	    	else {
	    		return null;
	    	}
		}

	    public function preencher($array = null) {
			if( $array ){
				$this->nome = $array["nome"];
		    	$this->descricao = $array["descricao"];
		    	$this->espaco = $array["espaco"];
		    	$this->endereco = $array["endereco"];
		    	$this->simbolo_id = $array["simbolos_turisticos"];
		    	$this->latitude = $array["latitude"];
		    	$this->longitude = $array["longitude"];
		    	$this->circuito_id = $array["circuito"];
		    	$this->funcionamento_inicio = $array["funcionamento_inicio"];
		    	$this->funcionamento_fim = $array["funcionamento_fim"];

				return true;
	    	} else {
	    		return null;
	    	}
	    }

	    public function salvar() {
			$db = getDB();

			$sql = "INSERT INTO lugar (nome, descricao, espaco, endereco, simbolo_id, latitude, longitude, circuito_id, funcionamento_inicio, funcionamento_fim)
				VALUES ('".$this->nome."',
						'".$this->descricao."',
						'".$this->espaco."',
						'".$this->endereco."',
						'".$this->simbolo_id."',
						'".$this->latitude."',
						'".$this->longitude."',
						'".$this->circuito_id."',
						'".$this->funcionamento_inicio."',
						'".$this->funcionamento_fim."')";

			$result = $db->query($sql);
			
			if($result){
				return $db->insert_id;;
	    	}
	    	else {
	    		return null;
	    	}
	    }
	}
?>