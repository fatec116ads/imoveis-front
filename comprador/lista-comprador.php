<?php 
	// chamada do microsserviço java para listar todos os compradores
	$compradores = enviarRequisicaoPost('comprador/listar', null)->body;
?>
<div class="tab-pane active" role="tabpanel" id="comprador">
	<div class="container">
		<div class="col-md-3" style="float: right; margin-top: 50px">
			<!-- Link para o botão que abre o modal de inclusão de novo comprador -->
			<a href="#modalIncluirComprador" data-toggle="modal"
				data-target="#modalIncluirComprador">
				<button class="btn btn-success" style="width: 100%">+
					Inserir novo Comprador</button>
			</a>
		</div>
		<!-- INICIO modal de inclusão de Comprador -->
		<div class="modal fade " id="modalIncluirComprador">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">Comprador</h3>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="comprador/incluir-comprador.php" id="form-comprador"
							method="Post">
							<div class="form-group">
								<label>UF</label> <input name="uf" type="text"
									class="form-control" id="inputUf" placeholder="UF" />
							</div>
							<div class="form-group">
								<label>Nome:</label> <input name="nomeComprador" type="text"
									class="form-control" id="inputNome" placeholder="Nome" />
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM modal de inclusão de Comprador -->

		<!-- INICIO Lista de todos os compradores -->
		<div class="page-header">
			<h1>Compradores:</h1>
		</div>
		<table
			class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Sigla</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($compradores as $comprador) { ?>
				<tr>
					<td>
						<?php echo $comprador->uf; ?>
					</td>
					<td>
						<?php echo $comprador->nomeComprador; ?>
					</td>
					<!-- Botão de Editar Comprador -->
					<td align="center"><a
						href="#modalEditarComprador<?php print_r($comprador->uf); ?>"
						data-toggle="modal"
						data-target="#modalEditarComprador<?php print_r($comprador->uf); ?>"> <span
							class="glyphicon glyphicon-pencil"></span>
					</a>
					<!-- FIM Lista de todos os compradores -->


					<!-- INICIO Modal de Edição de Comprador --> 
						<div class="modal fade "
							id="modalEditarComprador<?php print_r($comprador->uf); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Comprador</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="comprador/alterar-comprador.php" id="form-comprador"
											method="Post">
											<div class="form-group">
												<label>UF</label> <input name="sigla" type="text" disabled
													class="form-control" id="inputUf" placeholder="UF"
													value="<?php echo $comprador->uf; ?>" />
											</div>
											<div class="form-group">
												<label>Nome:</label> <input name="nomeComprador" type="text"
													class="form-control" id="inputNome" placeholder="Nome"
													value="<?php echo $comprador->nomeComprador; ?>" /> <input
													type="hidden" name="uf" value="<?php echo $comprador->uf; ?>" />
											</div>
											<div class="text-center">
												<button type="submit" class="btn btn-primary">Alterar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div> 
					<!-- FIM Modal de Edição de Comprador -->

					<!-- Botão de Consulta Comprador -->
					<a href="#modalConsultarComprador<?php print_r($comprador->uf); ?>"
					data-toggle="modal"
					data-target="#modalConsultarComprador<?php print_r($comprador->uf); ?>"> 
					<span class="glyphicon glyphicon-search"></span>
					</a>
					<!-- INICIO Modal Consulta de Comprador -->	
						<div class="modal fade "
							id="modalConsultarComprador<?php print_r($comprador->uf); ?>">

							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Comprador</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">

											<label>UF</label> <span> <?php print_r($comprador->uf); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Nome:</label> <span> <?php print_r($comprador->nomeComprador); ?>
											</span>
										</div>

									</div>
								</div>
							</div>
						</div> 
						<!-- FIM Modal de Consulta de Comprador -->

					<!-- Botão de Exclusão Comprador -->	
					<a href="#modalExcluirComprador<?php print_r($comprador->uf); ?>"
					data-toggle="modal"
					data-target="#modalExcluirComprador<?php print_r($comprador->uf); ?>"> 
					<span class="glyphicon glyphicon-remove"></span>
					</a>
					<!-- INICIO Modal de Exclusão de Comprador -->
						<div class="modal fade "

							id="modalExcluirComprador<?php print_r($comprador->uf); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Comprador</h3>
										<h5 class="modal-title" id="exampleModalLabel">

											Você tem certeza que deseja excluir o comprador
											<?php echo $comprador->uf; ?>

										</h5>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="comprador/excluir-comprador.php" id="form-comprador"
											method="Post">
											<div class="form-group">
												<div class="text-center">
													<button type="submit" class="btn btn-primary">Sim</button>
												</div>
												<div class="text-center">
													<button type="button" class="btn btn-primary"
														data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">Não</span>
													</button>
												</div>

												<input name="nomeComprador" type="hidden" class="form-control"
													id="inputNome" placeholder="Nome"
													value="<?php echo $comprador->nomeComprador; ?>" /> <input
													type="hidden" name="uf" value="<?php echo $comprador->uf; ?>" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<!-- FIM Modal de Exclusão de Compradores -->
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>