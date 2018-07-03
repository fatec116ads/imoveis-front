<?php 
	// chamada do microsservico java para listar todos as faixas imoveis
	$faixaimoveis = enviarRequisicaoPost('faixa-imovel/listar', null)->body;
?>
<div class="tab-pane" role="tabpanel" id="faixa-imovel">
	<div class="container">
		<div class="col-md-3" style="float: right; margin-top: 50px">
			<!-- Link para o botao que abre o modal de inclusao de nova Faixa Imovel -->
			<a href="#modalIncluirFaixaImovel" data-toggle="modal"
				data-target="#modalIncluirFaixaImovel">
				<button class="btn btn-success" style="width: 100%">+
					Inserir nova Faixa Imovel</button>
			</a>
		</div>
		<!-- INICIO modal de inclusao de Faixa Imovel -->
		<div class="modal fade " id="modalIncluirFaixaImovel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">FaixaImovel</h3>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="faixa-imovel/incluir-faixa-imovel.php" id="form-faixa-imovel"
							method="Post">
							<div class="form-group">
								<label>Codigo Faixa</label> <input name="cdFaixa" type="text"
									class="form-control" id="inputcdFaixa" placeholder="cdFaixa" />
							</div>
							<div class="form-group">
								<label>Nome</label> <input name="nmFaixa" type="text"
									class="form-control" id="inputnmFaixa" placeholder="nmFaixa" />
							</div>
							<div class="form-group">
								<label>Valor Minino</label> <input name="vlMinimo" type="text"
									class="form-control" id="inputvlMinimo" placeholder="vlMinimo" />
							</div>
							<div class="form-group">
								<label>Valor Maximo</label> <input name="vlMaximo" type="text"
									class="form-control" id="inputvlMaximo" placeholder="vlMaximo" />
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM modal de inclusao de Faixa Imovel -->

		<!-- INICIO Lista de todos as faixas de imovel -->
		<div class="page-header">
			<h1>Faixas Imovel:</h1>
		</div>
		<table
			class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nome</th>
					<th>Valor minino</th>
					<th>Valor maximo</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($faixaimoveis as $faixaImovel) { ?>
				<tr>
					<td>
						<?php echo $faixaImovel->cdFaixa; ?>
					</td>
					<td>
						<?php echo $faixaImovel->nmFaixa; ?>
					</td>
					<td>
						<?php echo $faixaImovel->vlMinimo; ?>
					</td>
					<td>
						<?php echo $faixaImovel->vlMaximo; ?>
					</td>
					<!-- Botao de Editar Faixa Imovel -->
					<td align="center"><a href="#modalEditarfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>" data-toggle="modal"
						data-target="#modalEditarfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>"> <span
							class="glyphicon glyphicon-pencil"></span>
					</a>
					<!-- FIM Lista de todos as faixas de imovel -->
					<a href="#modalConsultarfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>"
					data-toggle="modal"
					data-target="#modalConsultarfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>"> 
					<span class="glyphicon glyphicon-search"></span>
					</a>
					<a href="#modalExcluirfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>"
					data-toggle="modal"
					data-target="#modalExcluirfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>"> 
					<span class="glyphicon glyphicon-remove"></span>
					</a>

					<!-- INICIO Modal de Edicao de Faixa Imovel --> 
						<div class="modal fade "
							id="modalEditarfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Faixa Imovel</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="faixa-imovel/alterar-faixa-imovel.php" id="form-faixa-imovel"
											method="Post">
											<div class="form-group">
												<label>Codigo</label> <input name="cdFaixa" type="text" disabled
													class="form-control" id="inputcdFaixa" placeholder="cdFaixa"
													value="<?php echo $faixaImovel->cdFaixa; ?>" />
											</div>
											<div class="form-group">
												<label>Nome</label> <input name="nmFaixa" type="text"
													class="form-control" id="inputnmFaixa" placeholder="nmFaixa"
													value="<?php echo $faixaImovel->nmFaixa; ?>" /> 
											</div>
											<div class="form-group">
												<label>Valor Minimo</label> <input name="vlMinimo" type="text" 
													class="form-control" id="inputvlMinimo" placeholder="vlMinimo"
													value="<?php echo $faixaImovel->vlMinimo; ?>" />
											</div>
											<div class="form-group">
												<label>Valor Maximo</label> <input name="vlMaximo" type="text"
													class="form-control" id="inputvlMaximo" placeholder="vlMaximo"
													value="<?php echo $faixaImovel->vlMaximo; ?>" /> 
											</div>
											<div class="text-center">
												<button type="submit" class="btn btn-primary">Alterar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div> 
					<!-- FIM Modal de Edicao de Faixa Imovel -->
					<!-- Botao de Consulta Faixa Imovel -->
					
					<!-- INICIO Modal Consulta de Faixa Imovel -->	
						<div class="modal fade " 
							id="modalConsultarfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Faixa Imovel</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Codigo</label> <span> <?php print_r($faixaImovel->cdFaixa); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Nome</label> <span> <?php print_r($faixaImovel->nmFaixa); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Valor Minimo</label> <span> <?php print_r($faixaImovel->vlMinimo); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Valor Maximo</label> <span> <?php print_r($faixaImovel->vlMaximo); ?>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div> 
						<!-- FIM Modal de Consulta de Faixa Imovel -->
						<!-- Botao de Exclusao Faixa Imovel -->	
			
					<!-- INICIO Modal de Exclusao de Faixa Imovel -->
						<div class="modal fade "
							id="modalExcluirfaixaImovel<?php print_r($faixaImovel->cdFaixa); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Faixa Imovel</h3>
										<h5 class="modal-title" id="exampleModalLabel">
											Voce tem certeza que deseja excluir a faixa imovel?
											<?php echo $faixaImovel->cdFaixa; ?>
											
										</h5>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="faixa-imovel/excluir-faixa-imovel.php" id="form-faixaImovel"
											method="Post">
											<div class="form-group">
												<div class="text-center">
													<button type="submit" class="btn btn-primary">Sim</button>
												</div>
												<div class="text-center">
													<button type="button" class="btn btn-primary"
														data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">Nao</span>
													</button>
												</div>
												<input name="nmFaixa" type="hidden" class="form-control"
													id="inputnmFaixa" placeholder="nmFaixa"
													value="<?php echo $faixaImovel->nmFaixa; ?>" /> <input
													type="hidden" name="cdFaixa" value="<?php echo $faixaImovel->cdFaixa; ?>" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<!-- FIM Modal de Exclusao de Faixa Imovel -->
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>