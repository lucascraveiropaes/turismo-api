<?php
	/*
	** Rotas relacionadas à simbolos
	**/

	// Símbolos
	$app->get('/simbolos', function ($request, $response, $args) {
		return $this->view->render($response, 'simbolos-lista.php');
	});

	// Símbolos Novo
	$app->get('/simbolos/novo', function ($request, $response, $args) {
		return $this->view->render($response, 'simbolos-novo.php');
	});

?>