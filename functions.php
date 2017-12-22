<?php
	function getDB() {
		$Database = new Database();
		return $Database->conexao();
	}

	function moverArquivo($pasta, $arquivo, $nome) {
		$pasta = $_SERVER['HTTP_HOST'] . '/uploads' . $pasta;

		$pasta = str_replace("\\", "/", $pasta);

		$extension = pathinfo($arquivo->getClientFilename(), PATHINFO_EXTENSION);
	    $filename = sprintf('%s.%0.8s', $nome, $extension);

	    $arquivo->moveTo($pasta . $filename);

	    return ($pasta . $filename);
	}


?>