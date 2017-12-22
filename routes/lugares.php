<?php
	/*
	** Rotas relacionadas à lugares
	**/

	// Lugares
	$app->get('/lugares', function ($request, $response, $args) {

		$lugares = new Lugar();
		$data = $lugares->listar();

		return $response->withJson( $data );
	});

	// Lugares Novo
	$app->get('/lugares/novo', function ($request, $response, $args) {
		// Create Code
	});

	// Requisição Post Para Add Lugar no Banco
	$app->post('/lugares/novo', function ($request, $response) {
		$data = false;

		$form = $request->getParsedBody();

		$lugar = new Lugar();
		$lugar->preencher($form);
		$result = $lugar->salvar();

		if ($result != 0 && $result != null) {
			$imagens = $request->getUploadedFiles();
			$imagensURL = array();

			foreach ($imagens['imagens'] as $imagem) {
		        if ($imagem->getError() === UPLOAD_ERR_OK) {

		        	$nome = $result . "-" . dechex( rand(999, 999999) );

		        	$pasta = '/lugares/imagens/';
		        	$url = moverArquivo($pasta, $imagem, $nome);

		        	$imagensURL[] = array(
		        		'categoria' => 1,
		        		'imagem_id' => $result,
		        		'url' => $url
		        	);
		        }
		    }

		    $imagem = new Imagem();
		    $status = $imagem->salvarImagens($imagensURL);

		    $data = true;
		}

		return $response->withJson($data);
	});

?>