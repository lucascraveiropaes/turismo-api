<?php
	/**
	* Categoria: ID da categoria que aquela imagem pertence
	*		1 - Lugar,
	*		2 - Atividade,
	*		3 - Evento,
	*		4 - Circuito,
	*		5 - Comércio,
	*		6 - Comércio Categoria (thumbnail)
	*
	* Imagem ID: ID do elemento dentro da categoria
	*/
	class Imagem
	{
		private $id;
		private $categoria;
		private $imagem_id;
		private $url;

		public function getId()
		{
		    return $this->id;
		}
		public function setId($id)
		{
		    return $this->id = $id;
		}

		public function getCategoria()
		{
		    return $this->categoria;
		}
		public function setCategoria($categoria)
		{
		    return $this->categoria = $categoria;
		}

		public function getImagemId()
		{
		    return $this->imagem_id;
		}
		public function setImagemId($imagem_id)
		{
		    return $this->imagem_id = $imagem_id;
		}

		public function getUrl()
		{
		    return $this->url;
		}
		public function setUrl($url)
		{
		    return $this->url = $url;
		}

		/*
		** CRUD Functions
		**/

		public function listar($array = null) {
			$db = getDB();

			$sql = "SELECT * FROM `imagem` ";

			if ($array) {
				$categoria = $array['categoria'];
				$id = $array['imagem_id'];

				if ($categoria && $id) {
					$sql .= "WHERE `categoria` = " . $categoria;
					$sql .= " AND `imagem_id` = " . $id;
				}
				else if ($categoria) {
					$sql .= "WHERE `categoria` = " . $categoria;
				}
				else if ($id) {
					$sql .= "WHERE `imagem_id` = " . $id;
				}				
			}

			$result = $db->query($sql);

			if ($result) {
				$imagens = $result->fetch_all(MYSQLI_ASSOC);
				return $imagens;
			}
			else {
				$imagens = null;
				return null;
			}
		}

	    public function preencher($array = null) {
			if( $array ){
				$this->categoria = $array["categoria"];
		    	$this->imagem_id = $array["imagem_id"];
		    	$this->url = $array["url"];

				return true;
	    	} else {
	    		return null;
	    	}
	    }

	    public function salvar() {
			$db = getDB();

			$sql = "INSERT INTO imagem (categoria, imagem_id, url)
				VALUES ('".$this->categoria."',
						'".$this->imagem_id."',
						'".$this->url."')";

			$result = $db->query($sql);
			
			if($result){
				return true;
	    	}
	    	else {
	    		return null;
	    	}
	    }

	    public function salvarImagens($imagens = null) {
	    	if ($imagens) {
	    		foreach ($imagens as $imagem) {
	    			$this->preencher($imagem);
	    			$this->salvar($imagem);
	    		}

	    		return true;
	    	}
	    	else {
	    		return null;
	    	}
	    }
	}
?>