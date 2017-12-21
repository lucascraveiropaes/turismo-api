<?php
	/*
	** Rotas relacionadas a circuitos
	**/

	// Lugares
	$app->get('/circuitos', function ($request, $response, $args) {
		return $this->view->render($response, 'circuitos-lista.php');
	});

	// Lugares Novo
	$app->get('/circuitos/novo', function ($request, $response, $args) {
		return $this->view->render($response, 'circuitos-novo.php');
	});

?>