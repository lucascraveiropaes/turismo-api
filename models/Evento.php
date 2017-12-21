<?php
	/**
	* 
	*/
	class Evento
	{
		private $id;
		private $nome;
		private $descricao;
		private $latitude;
		private $longitude;
		private $data_inicio;
		private $data_fim;
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

		public function getData_inicio()
		{
		    return $this->data_inicio;
		}
		public function setData_inicio($data_inicio)
		{
		    return $this->data_inicio = $data_inicio;
		}

		public function getData_fim()
		{
		    return $this->data_fim;
		}
		public function setData_fim($data_fim)
		{
		    return $this->data_fim = $data_fim;
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