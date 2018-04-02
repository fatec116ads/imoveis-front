<?php 
require_once "vendor/autoload.php";

require_once "model/estado.php";

require_once "utils/restApi.php";
$estados = enviarRequisicao('estado/listar', null)->body;


foreach($estados as $estado)
{

	print_r($estado->uf.' - '.$estado->nomeEstado);
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Lista de Estados</title>
</head>
<body>
Bem-vindo
</body>
</html>