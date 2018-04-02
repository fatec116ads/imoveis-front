<?php
	function enviarRequisicao($urlRecurso, $objeto) {
		$headers = array('Accept' => 'application/json');
		$query = Unirest\Request\Body::json($objeto);
		$response = Unirest\Request::post('http://localhost:8080/'.$urlRecurso, $headers, $query);
		return $response;
	}
?>