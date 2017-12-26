<?php
	function getDB() {
		$Database = new Database();
		return $Database->conexao();
	}

	function moverArquivo($pasta, $arquivo, $nome) {
		$path = __DIR__ . '/uploads' . $pasta;

		$path = str_replace("\\", "/", $path);

		$extension = pathinfo($arquivo->getClientFilename(), PATHINFO_EXTENSION);
	    $filename = sprintf('%s.%0.8s', $nome, $extension);
		
	    $arquivo->moveTo($path . $filename);

	    $url = 'http://'.$_SERVER['HTTP_HOST'].'/uploads'.$pasta.$filename;

	    //'http://'.$_SERVER['SERVER_NAME'].'/uploads'.$pasta.$filename

	    return ($url);
	}

	function countFrom($array = null)
	{
		if ( $array && isset( $array['tabela'] ) ) {
			$db = getDB();

			$tabela = $array['tabela'];

			$sql = "SELECT COUNT(*) FROM $tabela";

			if ( isset($array['pesquisa']) && $array['pesquisa'] != null ) {
				$pesquisa = $array['pesquisa'];
				$sql .= " WHERE $pesquisa";
			}

			$result = $db->query($sql);
			$lugares = $result->fetch_all(MYSQLI_ASSOC);
				
			if($lugares){
			    return $lugares[0]["COUNT(*)"];
	    	}
	    	else {
	    		return null;
	    	}
		}
	}


?>