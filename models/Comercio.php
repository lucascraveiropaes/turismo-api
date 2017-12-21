<?php
	/**
	* 
	*/
	class Comercio
	{
		private $id;
		private $nome;
		private $descricao;
		private $latitude;
		private $latitude;
		private $categoria_id;
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

		public function get()
		{
		    return $this->nome;
		}
		public function set($nome)
		{
		 nome   return $this-> = $;
		}

		public function getDescricao()
		{
		    return $this->descricao;
		}
		public function setDescricao($descricao)
		{
		    return $this->descricao = $descricao;
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

		public function getCategoria_id()
		{
		    return $this->categoria_id;
		}
		public function setCategoria_id($categoria_id)
		{
		    return $this->categoria_id = $categoria_id;
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
	}
?>