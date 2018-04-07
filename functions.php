<?php
	function getDataByCategory($category=null, $id=null) {
		$result = array();

		if ($category) {
			if ($category == "circuitos") {
				$data = json_decode( file_get_contents("./data/lugares.json") );

				for ($i=0; $i < count($data); $i++) {
					if($data[$i]->circuito_id == $id) {
						array_push($result, $data[$i]);
					}
				}

				if (count($result) == 0) {
					$result	= null;
				}
			}
			else {
				$url = "./data/".$category.".json";
				$data = json_decode( file_get_contents($url, true) );

				for ($i=0; $i < count($data); $i++) {
					if($data[$i]->id == $id) {
						$result = $data[$i];
						$result->categoria = getCategoryById($result->categoria_id);
					}
				}
			}
		}

		return $result;
	}

	function getCategoryById($id) {
		$categorias = json_decode( file_get_contents("./data/categorias.json") );
		$return = null;

		for ($i=0; $i < count($categorias); $i++) {
			if ($categorias[$i]->id == $id) {
				$return = new stdClass;
				$return->id = $categorias[$i]->id;
				$return->nome = $categorias[$i]->nome;
				$return->imagem = $categorias[$i]->imagem;
				$return->descricao = $categorias[$i]->descricao;
			}
		}

		return $return;
	}

	function utf8ize($d) {
		if (is_array($d)) {
			foreach ($d as $k => $v) {
				$d[$k] = utf8ize($v);
			}
		} else if (is_string($d)) {
			return utf8_encode($d);
		}
		return $d;
	}

	function cmp($a, $b) {
		if ($a->position == $b->position) {
			return 1;
		}
		return ($a->position < $b->position) ? 1 : -1;
	}

	function alphabeticalOrderByName($a, $b) {
		if ($a->nome == $b->nome) {
			return -1;
		}
		return ($a->nome < $b->nome) ? -1 : 1;
	}

	function clearString($string) {
		$string = str_replace('-', '', $string);
		$string = str_replace('/', '', $string);
		$string = str_replace('(', '', $string);
		$string = str_replace(')', '', $string);
		$string = str_replace('  ', ' ', $string);

		return strtolower($string);
	}

	function formatContent($data, $result, $query, $category) {

		for ($i=0; $i < count($data); $i++) {
			$imagem = "";
			$excerpt = "";
			$position = 100;

			$stringsEqual = similar_text ( clearString($data[$i]->nome), clearString($query) );
			$position = ( 100 / strlen(clearString($query)) ) * $stringsEqual;

			if (array_key_exists("imagens",$data[$i])) {
				if (count($data[$i]->imagens) > 0)
					$imagem = $data[$i]->imagens[0]->url;
			}

			if ($category == "Agenda")
				$excerpt = $data[$i]->telefones[0];
			else
				$excerpt = mb_convert_encoding(substr($data[$i]->descricao, 0, 60),"UTF-8","auto");

			$obj = new stdClass;
			$obj->id = $data[$i]->id;
			$obj->nome = $data[$i]->nome;
			$obj->imagem = $imagem;
			$obj->excerpt = $excerpt;

			//$obj->excerpt = utf8ize(substr($data[$i]->descricao, 0, 60) . "...");
			//$obj->excerpt = substr($data[$i]->descricao, 0, 60) . "...";
			$obj->category = $category;
			$obj->position = $position;
			array_push($result, $obj);
		}

		return $result;
	}
?>
