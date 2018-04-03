<?php
	session_cache_limiter(false);
	session_start();
	error_reporting(E_ALL);

	require 'vendor/autoload.php';
	require 'functions.php';

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
	        $uri = $uri->withPath(substr($path, 0, -1));
	        if($request->getMethod() == 'GET')
	            return $response->withRedirect((string)$uri, 301);
	        else
	            return $next($request->withUri($uri), $response);
	    }
	    return $next($request, $response);
	});

	/*******************************************************************************\
	|                                                                               |
	|                                    Index                                      |
	|                                                                               |
	\*******************************************************************************/
	$app->get('/', function ($request, $response, $args) {
		return $response->withJson(array(
			'mensagem' => "Bem vindo à API do Aplicativo Turismo Quissamã"
		));
	});

	/*
	** Retorna o json específico da rota solicitada
	**/
	$app->get('/{ category }', function ($request, $response, $args) {
		$route = $request->getAttribute("route");
		$category = $route->getArgument("category");
		$url = "./data/".$category.".json";
		$data = json_decode( file_get_contents($url, true) );
		$result = array();

		for ($i=0; $i < count($data); $i++) {
			$obj = new stdClass;
			$obj->id = $data[$i]->id;
			$obj->nome = $data[$i]->nome;
			$obj->imagens = $data[$i]->imagens;
			
			array_push($result, $obj);
		}

		return $response->withJson( $result );
	});

	$app->get('/{ category }/{ id }', function ($request, $response, $args) {
		$route 		= $request->getAttribute("route");
		$category 	= $route->getArgument("category");
		$id 		= $route->getArgument("id");

		$result = getDataByCategory($category, $id);

		return $response->withJson( $result );
	});

	$app->run();
?>
