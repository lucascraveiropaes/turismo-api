<?php
	/*
	** Rotas relacionadas a circuitos
	**/

	// Lugares
	$app->get('/circuitos', function ($request, $response, $args) {

		$circuitos = new Circuito();
		$data = $circuitos->listar();

		for ($i=0; $i<count($data); $i++) {

			$lugaresQNTD = countFrom(array(
				'tabela' => 'lugar',
				'pesquisa' => 'circuito_id = '. $data[$i]["id"] 
			));

			$data[$i]["lugares"] = $lugaresQNTD;
		}

		return $response->withJson( $data );
	});

	// Lugares Novo
	$app->post('/circuitos/novo', function ($request, $response) {
		$data = false;

		$imagens = $request->getUploadedFiles();
		
		$imagem = $imagens['imagem'];
	    if ($imagem->getError() === UPLOAD_ERR_OK) {
	        $nome = "c-" . dechex( rand(999, 999999) );

        	$pasta = '/circuitos/imagens/';
        	$url = moverArquivo($pasta, $imagem, $nome);
	    }

	    if ($url) {
	    	$form = $request->getParsedBody();
			$form["imagem"] = $url;

			$circuito = new Circuito();
			$circuito->preencher($form);
			$result = $circuito->salvar();

			if ($result) : $data = true; endif; 		    
		}

		return $response->withJson($data);
	});

?>