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
?>