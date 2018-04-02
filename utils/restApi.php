<?php
	function enviarRequisicaoPost($urlRecurso, $objeto) {
		$headers = array('Content-Type' => 'application/json');
		$query = Unirest\Request\Body::json($objeto);
		$response = Unirest\Request::post('http://localhost:8080/'.$urlRecurso, $headers, $query);
		return $response;
	}
?>