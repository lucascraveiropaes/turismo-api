<?php
	/**
	* 
	*/
	class Circuito
	{
		private $id;
		private $nome;
		private $imagem;

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

		public function getImagem()
		{
		    return $this->imagem;
		}
		public function setImagem($imagem)
		{
		    return $this->imagem = $imagem;
		}

		/* CRUD Functions */

		public function listar() {
			$db = getDB();

			$sql = "SELECT * FROM circuito";

			$result = $db->query($sql);
			$lugares = $result->fetch_all(MYSQLI_ASSOC);
				
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
		    	$this->imagem = $array["imagem"];

				return true;
	    	} else {
	    		return null;
	    	}
	    }

	    public function salvar() {
			$db = getDB();

			$sql = "INSERT INTO circuito (nome, imagem)
				VALUES ('".$this->nome."',
						'".$this->imagem."')";

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