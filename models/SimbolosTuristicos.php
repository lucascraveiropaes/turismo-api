<?php
	/**
	* 
	*/
	class SimbolosTuristicos
	{
		private $id;
		private $nome;
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
	}
?>