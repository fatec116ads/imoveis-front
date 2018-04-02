<?php 
	$estados = enviarRequisicaoPost('estado/listar', null)->body;
?>
<div class="tab-pane active" role="tabpanel" id="estado">
	<div class="container">
   		
   		<div class="col-md-3" style="float:right; margin-top: 50px">
			<a href="#modalIncluir" data-toggle="modal" data-target="#modalIncluir"><button class="btn btn-success" style="width: 100%">+ Inserir novo Estado</button></a>
		</div>
		<div class="modal fade " id="modalIncluir" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Estado</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="estado/incluir-estado.php" id="form-estado" method="Post" >
                                <div class="form-group">
                                    <label>UF</label>
                                    <input name="uf" type="text" class="form-control" id="inputUf" placeholder="UF"/>
                                </div>
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input name="nomeEstado" type="text" class="form-control" id="inputNome" placeholder="Nome"/>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        </div>     
                    </div>
                </div>
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
   						<a href="#modalEditar<?php print_r($estado->uf); ?>" data-toggle="modal" data-target="#modalEditar<?php print_r($estado->uf); ?>">
        					<span class="glyphicon glyphicon-pencil"></span>
      					</a>
      					<div class="modal fade " id="modalEditar<?php print_r($estado->uf); ?>" >
			                <div class="modal-dialog">
			                    <div class="modal-content">
			                        <div class="modal-header">
			                            <h3 class="modal-title" id="exampleModalLabel">Estado</h3>
			                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                <span aria-hidden="true">&times;</span>
			                            </button>
			                        </div>
			                        <div class="modal-body">
			                            <form action="estado/alterar-estado.php" id="form-estado" method="Post" >
			                                <div class="form-group">
			                                    <label>UF</label>
			                                    <input name="sigla" type="text" disabled class="form-control" id="inputUf" placeholder="UF" value="<?php echo $estado->uf; ?>" />
			                                </div>
			                                <div class="form-group">
			                                    <label>Nome:</label>
			                                    <input name="nomeEstado" type="text" class="form-control" id="inputNome" placeholder="Nome" value="<?php echo $estado->nomeEstado; ?>" />
                                          <input type="hidden" name="uf" value="<?php echo $estado->uf; ?>"/>
			                                </div>
			                                <div class="text-center">
			                                    <button type="submit" class="btn btn-primary">Alterar</button>
			                                </div>
			                            </form>
			                        </div>     
			                    </div>
			                </div>
			            </div>					
      					<a href="#modalConsultar<?php print_r($estado->uf); ?>" data-toggle="modal" data-target="#modalConsultar<?php print_r($estado->uf); ?>">
        					<span class="glyphicon glyphicon-search"></span>
      					</a>
			      		<div class="modal fade " id="modalConsultar<?php print_r($estado->uf); ?>" >
			                <div class="modal-dialog">
			                    <div class="modal-content">
			                        <div class="modal-header">
			                            <h3 class="modal-title" id="exampleModalLabel">Estado</h3>
			                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                <span aria-hidden="true">&times;</span>
			                            </button>
			                        </div>
			                        <div class="modal-body">
			                            
		                                <div class="form-group">
		                                    <label>UF</label>
		                                    <span><?php print_r($estado->uf); ?></span>
		                                </div>
		                                <div class="form-group">
		                                    <label>Nome:</label>
		                                    <span><?php print_r($estado->nomeEstado); ?></span>
		                                </div>
		                                             
			                        </div>     
			                    </div>
			                </div>
			            </div>				
      					<a href="#modalExcluir<?php print_r($estado->uf); ?>" data-toggle="modal" data-target="#modalExcluir<?php print_r($estado->uf); ?>">
        					<span class="glyphicon glyphicon-remove"></span>
      					</a>
                <div class="modal fade " id="modalExcluir<?php print_r($estado->uf); ?>" >
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h3 class="modal-title" id="exampleModalLabel">Estado</h3>
                                  <h5 class="modal-title" id="exampleModalLabel">Você tem certeza que deseja excluir o estado <?php echo $estado->uf; ?>?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="estado/excluir-estado.php" id="form-estado" method="Post" >
                                      <div class="form-group">
                                         <div class="text-center">
                                          <button type="submit" class="btn btn-primary">Sim</button>
                                      </div>
                                      <div class="text-center">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">Não</span>
                                    </button>
                                      </div>
                                          <input name="nomeEstado" type="hidden" class="form-control" id="inputNome" placeholder="Nome" value="<?php echo $estado->nomeEstado; ?>" />
                                          <input type="hidden" name="uf" value="<?php echo $estado->uf; ?>"/>
                                      </div>
                                      
                                  </form>
                              </div>     
                          </div>
                      </div>
                  </div>          

      				</td>
   				</tr>
   			<?php } ?>
   			</tbody>
   		</table>
   	</div> 
</div>