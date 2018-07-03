<?php 
	// chamada do microsserviço java para listar todos os bairros
	$bairros = enviarRequisicaoPost('bairro/listar', null)->body;
?>
<div class="tab-pane" role="tabpanel" id="bairro">
	<div class="container">
		<div class="col-md-3" style="float: right; margin-top: 50px">
			<!-- Link para o botão que abre o modal de inclusão de novo Bairro -->
			<a href="#modalIncluirBairro" data-toggle="modal"
				data-target="#modalIncluirBairro">
				<button class="btn btn-success" style="width: 100%">+
					Inserir novo Bairro</button>
			</a>
		</div>
		<!-- INICIO modal de inclusão de Bairro -->
		<div class="modal fade " id="modalIncluirBairro">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">Bairro</h3>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="bairro/incluir-bairro.php" id="form-bairro"
							method="Post">
							<div class="form-group">
								<label>Código Bairro</label> <input name="cdBairro" type="text"
									class="form-control" id="inputCodBairro" placeholder="Código Bairro" />
							</div>
							<div class="form-group">
								<label>Nome Bairro:</label> <input name="nmBairro" type="text"
									class="form-control" id="inputNomeBairro" placeholder="Nome" />
							</div>
							<select  class="form-control" name="cidade">
								<?php foreach($cidades as $cidade) { ?>
								<option value="<?php echo $cidade->cdCidade; ?>"><?php echo $cidade->nmCidade; ?></option>
								<?php } ?>
							</select>	
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM modal de inclusão de Bairro -->

		<!-- INICIO Lista de todos os bairros -->
		<div class="page-header">
			<h1>Bairros:</h1>
		</div>
		<table
			class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Código Bairro</th>
					<th>Nome</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($bairros as $bairro) { ?>
				<tr>
					<td>
						<?php echo $bairro->cdBairro; ?>
					</td>
					<td>
						<?php echo $bairro->nmBairro; ?>
					</td>
					<td>
						<?php echo $bairro->cidade->nmCidade; ?>
					</td>
					<td>
						<?php echo $bairro->cidade->estado->uf; ?>
					</td>
					<!-- Botão de Editar Bairro -->
					<td align="center"><a
						href="#modalEditarBairro<?php print_r($bairro->cdBairro); ?>"
						data-toggle="modal"
						data-target="#modalEditarBairro<?php print_r($bairro->cdBairro); ?>"> <span
							class="glyphicon glyphicon-pencil"></span>
					</a>
					<!-- FIM Lista de todos os bairros -->

					<!-- INICIO Modal de Edição de Bairro --> 
						<div class="modal fade "
							id="modalEditarBairro<?php print_r($bairro->cdBairro); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Bairro</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="bairro/alterar-bairro.php" id="form-bairro"
											method="Post">
											<div class="form-group">
												<label>Código Bairro</label> <input name="sigla" type="text" disabled
													class="form-control" id="inputCodBairro" placeholder="Código Bairro"
													value="<?php echo $bairro->cdBairro; ?>" />
											</div>
											<div class="form-group">
												<label>Nome Bairro:</label> <input name="nmBairro" type="text"
													class="form-control" id="inputNomeBairro" placeholder="Nome"
													value="<?php echo $bairro->nmBairro; ?>" /> <input
													type="hidden" name="cdBairro" value="<?php echo $bairro->cdBairro; ?>" />
											</div>
											<select  class="form-control" name="cidade">
													<?php foreach($cidades as $cidade) { ?>
													<option <?php

														if($bairro->cidade->cdCidade == $cidade->cdCidade) {
															echo 'selected="selected';
														}

												 ?> value="<?php echo $cidade->cdCidade; ?>"><?php echo $cidade->nmCidade; ?></option>
													<?php } ?>
												</select>	
											<div class="text-center">
												<button type="submit" class="btn btn-primary">Alterar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div> 
					<!-- FIM Modal de Edição de Bairro -->

					<!-- Botão de Consulta Bairro -->
					<a href="#modalConsultarBairro<?php print_r($bairro->cdBairro); ?>"
					data-toggle="modal"
					data-target="#modalConsultarBairro<?php print_r($bairro->cdBairro); ?>"> 
					<span class="glyphicon glyphicon-search"></span>
					</a>
					<!-- INICIO Modal Consulta de Bairro -->	
						<div class="modal fade "
							id="modalConsultarBairro<?php print_r($bairro->cdBairro); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Bairro</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Código Bairro</label> <span> <?php print_r($bairro->cdBairro); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Nome Bairro:</label> <span> <?php print_r($bairro->nmBairro); ?>
											</span>
										</div><label>Nome Cidade:</label>
										 <span> <?php print_r($bairro->cidade->nmCidade); ?></span>
									</div>
								</div>
							</div>
						</div> 
						<!-- FIM Modal de Consulta de Bairro -->

					<!-- Botão de Exclusão Bairro -->	
					<a href="#modalExcluirBairro<?php print_r($bairro->cdBairro); ?>"
					data-toggle="modal"
					data-target="#modalExcluirBairro<?php print_r($bairro->cdBairro); ?>"> 
					<span class="glyphicon glyphicon-remove"></span>
					</a>
					<!-- INICIO Modal de Exclusão de Bairro -->
						<div class="modal fade "
							id="modalExcluirBairro<?php print_r($bairro->cdBairro); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Bairro</h3>
										<h5 class="modal-title" id="exampleModalLabel">
											Você tem certeza que deseja excluir o bairro
											<?php echo $bairro->cdBairro; ?>
											?
										</h5>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="bairro/excluir-bairro.php" id="form-bairro"
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
												<input name="nmBairro" type="hidden" class="form-control"
													id="inputNomeBairro" placeholder="Nome"
													value="<?php echo $bairro->nmBairro; ?>" /> <input
													type="hidden" name="cdBairro" value="<?php echo $bairro->cdBairro; ?>" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<!-- FIM Modal de Exclusão de Bairro -->
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>