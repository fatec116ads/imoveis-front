<?php 
	// chamada do microsserviço java para listar todos os estados
	$estados = enviarRequisicaoPost('estado/listar', null)->body;
?>
<div class="tab-pane active" role="tabpanel" id="cidade">
	<div class="container">
		<div class="col-md-3" style="float: right; margin-top: 50px">
			<!-- Link para o botão que abre o modal de inclusão de novo Estado -->
			<a href="#modalIncluirCidade" data-toggle="modal"
				data-target="#modalIncluirCidade">
				<button class="btn btn-success" style="width: 100%">+
					Inserir nova Cidade</button>
			</a>
		</div>
		<!-- INICIO modal de inclusão de Cidade -->
		<div class="modal fade " id="modalIncluirCidade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">Cidade</h3>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="cidade/incluir-cidade.php" id="form-cidade"
							method="Post">
							<div class="form-group">
								<label>Código Cidade</label> <input name="cdCidade" type="text"
									class="form-control" id="inputCdCidade" placeholder="Código Cidade" />
							</div>
							<div class="form-group">
								<label>Nome:</label> <input name="nmCidade" type="text"
									class="form-control" id="inputNomeCidade" placeholder="Nome" />
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM modal de inclusão da Cidade -->

		<!-- INICIO Lista de todos as cidades -->
		<div class="page-header">
			<h1>Cidades:</h1>
		</div>
		<table
			class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Código Cidade</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($cidade as $cidade) { ?>
				<tr>
					<td>
						<?php echo $cidade->uf; ?>
					</td>
					<td>
						<?php echo $cidade->nomeCidade; ?>
					</td>
					<!-- Botão de Editar Cidade -->
					<td align="center"><a
						href="#modalEditarCidade<?php print_r($cidade->uf); ?>"
						data-toggle="modal"
						data-target="#modalEditarCidade<?php print_r($cidade->uf); ?>"> <span
							class="glyphicon glyphicon-pencil"></span>
					</a>
					<!-- FIM Lista de todos os cidade -->

					<!-- INICIO Modal de Edição da cidade --> 
						<div class="modal fade "
							id="modalEditarCidade<?php print_r($cidade->uf); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Cidade</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="estado/alterar-cidade.php" id="form-cidade"
											method="Post">
											<div class="form-group">
												<label>Código Cidade</label> <input name cdCidade="sigla" type="text" disabled
													class="form-control" id="inputUf" placeholder="UF"
													value="<?php echo $cidade->uf; ?>" />
											</div>
											<div class="form-group">
												<label>Nome:</label> <input name="nomeCidade" type="text"
													class="form-control" id="inputNome" placeholder="Nome"
													value="<?php echo $estado->nomeCidade; ?>" /> <input
													type="hidden" name="uf" value="<?php echo $cidade->uf; ?>" />
											</div>
											<div class="text-center">
												<button type="submit" class="btn btn-primary">Alterar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div> 
					<!-- FIM Modal de Edição de Cidade -->

					<!-- Botão de Consulta Cidade -->
					<a href="#modalConsultar<?php print_r($cidade->uf); ?>"
					data-toggle="modal"
					data-target="#modalConsultar<?php print_r($cidade->uf); ?>"> 
					<span class="glyphicon glyphicon-search"></span>
					</a>
					<!-- INICIO Modal Consulta de cidade -->	
						<div class="modal fade "
							id="modalConsultar<?php print_r($cidade->uf); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Cidade</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>UF</label> <span> <?php print_r($cidade->uf); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Nome:</label> <span> <?php print_r($cidade->nomeCidade); ?>
											</span>
										</div>

									</div>
								</div>
							</div>
						</div> 
						<!-- FIM Modal de Consulta de Cidade -->

					<!-- Botão de Exclusão Cidade -->	
					<a href="#modalExcluir<?php print_r($cidade->uf); ?>"
					data-toggle="modal"
					data-target="#modalExcluir<?php print_r($cidade->uf); ?>"> 
					<span class="glyphicon glyphicon-remove"></span>
					</a>
					<!-- INICIO Modal de Exclusão de Cidade -->
						<div class="modal fade "
							id="modalExcluir<?php print_r($cidade->uf); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Cidade</h3>
										<h5 class="modal-title" id="exampleModalLabel">
											Você tem certeza que deseja excluir o cidade
											<?php echo $cidade->uf; ?>
											?
										</h5>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="estado/excluir-cidade.php" id="form-cidade"
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
												<input name="nomeCidade" type="hidden" class="form-control"
													id="inputNome" placeholder="Nome"
													value="<?php echo $estado->nomeCidade; ?>" /> <input
													type="hidden" name="uf" value="<?php echo $cidade->uf; ?>" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<!-- FIM Modal de Exclusão de Cidade -->
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>