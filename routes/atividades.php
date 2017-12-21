<?php
	/*
	** Rotas relacionadas à atividades
	**/

	// Lugares
	$app->get('/atividades', function ($request, $response, $args) {
		return $this->view->render($response, 'atividades-lista.php');
	});

	// Lugares Novo
	$app->get('/atividades/novo', function ($request, $response, $args) {
		return $this->view->render($response, 'atividades-novo.php');
	});

?>