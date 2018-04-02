<?php 
	$estados = enviarRequisicao('estado/listar', null)->body;
?>
<div class="tab-pane active" role="tabpanel" id="estado">
	<div class="container">
   		
   		<div class="col-md-3" style="float:right; margin-top: 50px">
			<button class="btn btn-success" style="width: 100%">+ Inserir novo Estado</button>
		</div>
   		<div class="page-header">
   			<h1>Estados:</h1>
   		</div>
   		

   		<table class="table table-striped table-bordered table-hover table-condensed">
   			<thead>
   				<tr>
   					<th>Sigla</th>
   					<th>Nome</th>
   					<th></th>
   				</tr>
   			</thead>
   			<tbody>
   			<?php foreach($estados as $estado) { ?>	
   				<tr >
   					<td><?php echo $estado->uf; ?></td>
   					<td><?php echo $estado->nomeEstado; ?></td>
   					<td align="center">
   						<a href="https://www.google.com.br/">
        					<span class="glyphicon glyphicon-pencil"></span>
      					</a>
      					<a href="https://www.google.com.br/">
        					<span class="glyphicon glyphicon-search"></span>
      					</a>
      					<a href="https://www.google.com.br/">
        					<span class="glyphicon glyphicon-remove"></span>
      					</a>
      				</td>
   				</tr>
   			<?php } ?>
   			</tbody>
   		</table>
   	</div> 
</div>