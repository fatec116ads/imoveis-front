<?php 
$estados = enviarRequisicao('estado/listar', null)->body;
?>

<div class="container">
   		
   		<div class="page-header">
   			<h1>Estados:</h1>
   		</div>

   		<table class="table table-striped table-bordered table-hover table-condensed">
   			<thead>
   				<tr>
   					<th>Sigla</th>
   					<th>Nome</th>
   				</tr>
   			</thead>
   			<tbody>
   			<?php foreach($estados as $estado) { ?>	
   				<tr >
   					<td><?php echo $estado->uf; ?></td>
   					<td><?php echo $estado->nomeEstado; ?></td>
   				</tr>
   			<?php } ?>
   			</tbody>
   		</table>

   	</div> 