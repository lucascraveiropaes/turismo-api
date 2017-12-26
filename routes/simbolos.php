<?php
	/*
	** Rotas relacionadas à simbolos
	**/

	// Símbolos
	$app->get('/simbolos', function ($request, $response, $args) {
		$simbolos = new Simbolo();
		$data = $simbolos->listar();

		return $response->withJson( $data );
	});

	// Símbolos Novo
	$app->post('/simbolos/novo', function ($request, $response, $args) {
		$data = false;

		$imagens = $request->getUploadedFiles();

		$imagem = $imagens['url'];
	    if ($imagem->getError() === UPLOAD_ERR_OK) {
	        $nome = "s-" . dechex( rand(999, 999999) );

        	$pasta = '/simbolos/imagens/';
        	$url = moverArquivo($pasta, $imagem, $nome);
	    }

		if ($url) {
			$form = $request->getParsedBody();
			$form["url"] = $url;

			$simbolo = new Simbolo();
			$simbolo->preencher($form);
			$result = $simbolo->salvar();

			if ($result) : $data = true; endif; 		    
		}

		return $response->withJson($data);
	});

?>