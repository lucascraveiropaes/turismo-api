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
			}
			else {
				$url = "./data/".$category.".json";
				$data = json_decode( file_get_contents($url, true) );

				for ($i=0; $i < count($data); $i++) {
					if($data[$i]->id == $id) {
						$result = $data[$i];
					}
				}
			}
		}

		if (count($result) == 0) {
			$result	= null;
		}

		return $result;
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

	function formatContent($data, $result, $query, $category) {
		for ($i=0; $i < count($data); $i++) {
			$imagem = "";
			if (count($data[$i]->imagens) > 0) {
				$imagem = $data[$i]->imagens[0]->url;
			}

			$obj = new stdClass;
			$obj->id = $data[$i]->id;
			$obj->nome = $data[$i]->nome;
			$obj->imagem = $imagem;
			//$obj->excerpt = utf8ize(substr($data[$i]->descricao, 0, 60) . "...");
			$obj->excerpt = substr($data[$i]->descricao, 0, 60) . "...";
			$obj->category = $category;
			$obj->position = similar_text(strtolower($data[$i]->nome), strtolower($query));
			array_push($result, $obj);
		}

		return $result;
	}
?>