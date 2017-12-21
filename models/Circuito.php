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
	}
?>