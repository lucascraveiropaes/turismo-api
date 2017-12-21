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

	// Requisição Post Para Add Data no Banco
	$app->post('/lugares/novo', function ($request, $response, $args) {
		$content = $request->getParsedBody();

		$nome = $content['nome'];

		$data = array(
			'nome' => $nome
		);

		return $response->withJson($data);
	});

?>