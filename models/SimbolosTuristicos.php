<?php
	/**
	* 
	*/
	class Simbolo
	{
		private $id;
		private $nome;
		private $descricao;
		private $url;
		
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

		public function getUrl()
		{
		    return $this->url;
		}
		public function setUrl($url)
		{
		    return $this->url = $url;
		}

		public function getDescricao()
		{
		    return $this->descricao;
		}
		public function setDescricao($descricao)
		{
		    return $this->descricao = $descricao;
		}

		/* CRUD Functions */

		public function listar() {
			$db = getDB();

			$sql = "SELECT * FROM simbolos_turisticos";

			$result = $db->query($sql);
			$simbolos = $result->fetch_all(MYSQLI_ASSOC);
				
			if($simbolos){
			    return $simbolos;
	    	}
	    	else {
	    		return null;
	    	}
		}

	    public function preencher($array = null) {
			if( $array ){
				$this->nome = $array["nome"];
		    	$this->url = $array["url"];
		    	$this->descricao = $array["descricao"];

				return true;
	    	} else {
	    		return null;
	    	}
	    }

	    public function salvar() {
			$db = getDB();

			$sql = "INSERT INTO simbolos_turisticos (nome, descricao, url)
				VALUES ('".$this->nome."',
						'".$this->descricao."',
						'".$this->url."')";

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