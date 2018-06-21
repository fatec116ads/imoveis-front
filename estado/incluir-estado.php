<?php
	require_once "../vendor/autoload.php";
	require_once "../utils/RestApi.php";

	$obj = json_encode($_POST);

	$response = enviarRequisicaoPost('estado/inserir', $_POST);

	header('Location: /imoveis-front/index.php');

 ?>

