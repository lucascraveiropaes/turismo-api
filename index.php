<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	header('Content-Type: text/html; charset=utf-8');

	session_cache_limiter(false);
	session_start();

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	require 'vendor/autoload.php';
	require 'models/Database.php';
	require 'models/Imagem.php';
	require 'models/Lugar.php';
	require 'models/Circuito.php';

	$app = new \Slim\App(array(
		'settings' => [
	        'displayErrorDetails' => true
	    ],
		'templates.path' => 'views'
	));

	use Psr\Http\Message\RequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;
	use Slim\Http\UploadedFile;

	/*
	** Função para ignorar a presença ou a falta de '/' no link
	**/
	$app->add(function (Request $request, Response $response, callable $next) {
	    $uri = $request->getUri();
	    $path = $uri->getPath();
	    if ($path != '/' && substr($path, -1) == '/') {
	        // permanently redirect paths with a trailing slash
	        // to their non-trailing counterpart
	        $uri = $uri->withPath(substr($path, 0, -1));
	        
	        if($request->getMethod() == 'GET') {
	            return $response->withRedirect((string)$uri, 301);
	        }
	        else {
	            return $next($request->withUri($uri), $response);
	        }
	    }

	    return $next($request, $response);
	});

	include 'functions.php';

	/*******************************************************************************\
	|                                                                               |
	|                                    Index                                      |
	|                                                                               |
	\*******************************************************************************/

	// Index
	$app->get('/', function ($request, $response, $args) {
		
		$data = array(
			'mensagem' => "Requisição inválida"
		);

		return $response->withJson($data);
	});

	include './routes/lugares.php';

	include './routes/circuitos.php';

	include './routes/comercios.php';

	include './routes/atividades.php';

	include './routes/eventos.php';

	include './routes/simbolos.php';

	$app->run();
?>