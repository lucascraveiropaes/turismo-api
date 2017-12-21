<?php
	/*
	** Rotas relacionadas à comercios
	**/

	// Comercios
	$app->get('/comercios', function ($request, $response, $args) {
		return $this->view->render($response, 'comercios-lista.php');
	});

	// Comercios Novo
	$app->get('/comercios/novo', function ($request, $response, $args) {
		return $this->view->render($response, 'comercios-novo.php');
	});

?>