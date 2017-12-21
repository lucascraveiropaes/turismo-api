<?php
	/**
	* 
	*/
	class Usuario
	{
		private $id;
		private $nome;
		private $sobrenome;
		private $email;
		private $senha;
		private $tutorial;

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

		public function getSobrenome()
		{
		    return $this->sobrenome;
		}
		public function setSobrenome($sobrenome)
		{
		    return $this->sobrenome = $sobrenome;
		}

		public function getEmail()
		{
		    return $this->email;
		}
		public function setEmail($email)
		{
		    return $this->email = $email;
		}

		public function getSenha()
		{
		    return $this->senha;
		}
		public function setSenha($senha)
		{
		    return $this->senha = $senha;
		}

		public function getTutorial()
		{
		    return $this->tutorial;
		}
		public function setTutorial($tutorial)
		{
		    return $this->tutorial = $tutorial;
		}
	}
?>