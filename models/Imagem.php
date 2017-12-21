<?php
	/**
	* 
	*/
	class Imagem
	{
		private $id;
		private $categoria;
		private $categoria_id;
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

		public function getCategoria_id()
		{
		    return $this->categoria_id;
		}
		public function setCategoria_id($categoria_id)
		{
		    return $this->categoria_id = $categoria_id;
		}

		public function getUrl()
		{
		    return $this->url;
		}
		public function setUrl($url)
		{
		    return $this->url = $url;
		}
	}
?>