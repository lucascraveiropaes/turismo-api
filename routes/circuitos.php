<?php
	/*
	** Rotas relacionadas a circuitos
	**/

	// Lugares
	$app->get('/circuitos', function ($request, $response, $args) {
		$lugares = new Lugar();
		$data = $lugares->listar();

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

        	echo($url);
	    }

	    $form = $request->getParsedBody();

		if ($url) {
			$circuito = new Circuito();
			$circuito->preencher($form);
			$result = $lugar->salvar();

		    $data = true;
		}

		return $response->withJson($data);
	});

?>