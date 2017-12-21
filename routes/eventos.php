<?php
	/*
	** Rotas relacionadas à lugares
	**/

	// Lugares
	$app->get('/eventos', function ($request, $response, $args) {
		return $this->view->render($response, 'eventos-lista.php');
	});

	// Lugares Novo
	$app->get('/eventos/novo', function ($request, $response, $args) {
		return $this->view->render($response, 'eventos-novo.php');
	});

?>