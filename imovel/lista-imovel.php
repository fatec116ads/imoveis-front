<?php 
	// chamada do microsservico java para listar todos os imoveis
	$imoveis = enviarRequisicaoPost('imovel/listar', null)->body;
?>
<div class="tab-pane" role="tabpanel" id="imovel">
	<div class="container">
		<div class="col-md-3" style="float: right; margin-top: 50px">
			<!-- Link para o botao que abre o modal de inclusao de novo Imovel -->
			<a href="#modalIncluirImovel" data-toggle="modal"
				data-target="#modalIncluirImovel">
				<button class="btn btn-success" style="width: 100%">+
					Inserir novo Imovel</button>
			</a>
		</div>
		<!-- INICIO modal de inclusao de Imovel -->
		<div class="modal fade " id="modalIncluirImovel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">Imovel</h3>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="imovel/incluir-imovel.php" id="form-imovel"
							method="Post">
							<div class="form-group">
								<label>Codigo</label> <input name="cdImovel" type="text"
									class="form-control" id="inputcdImovel" placeholder="cdImovel" />
							</div>
							<div class="form-group">
								<label>Endereco</label> <input name="nmEndereco" type="text"
									class="form-control" id="inputnmEndereco" placeholder="nmEndereco" />
							</div>
							<div class="form-group">
								<label>Area Util</label> <input name="nrAreaUtil" type="text"
									class="form-control" id="inputnrAreaUtil" placeholder="nrAreaUtil" />
							</div>
							<div class="form-group">
								<label>Area Total</label> <input name="nrAreaTotal" type="text"
									class="form-control" id="inputnrAreaTotal" placeholder="nrAreaTotal" />
							</div>
							<div class="form-group">
								<label>Preco</label> <input name="vlPreco" type="text"
									class="form-control" id="inputvlPreco" placeholder="vlPreco" />
							</div>
							<div class="form-group">
								<label>Status</label> <input name="stVendido" type="text"
									class="form-control" id="inputstVendido" placeholder="stVendido" />
							</div>
							<div class="form-group">
								<label>Data de lancamento</label> <input name="dataLancto" type="text"
									class="form-control" id="inputdataLancto" placeholder="dataLancto" />
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- FIM modal de inclusao de Imovel -->

		<!-- INICIO Lista de todos os imoveis -->
		<div class="page-header">
			<h1>Imoveis:</h1>
		</div>
		<table
			class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Endereco</th>
					<th>Area Util</th>
					<th>Area Total</th>
					<th>Preco</th>
					<th>Status</th>
					<th>Data de lancamento</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($imoveis as $imovel) { ?>
				<tr>
					<td>
						<?php echo $imovel->cdImovel; ?>
					</td>
					<td>
						<?php echo $imovel->nmEndereco; ?>
					</td>
					<td>
						<?php echo $imovel->nrAreaUtil; ?>
					</td>
					<td>
						<?php echo $imovel->nrAreaTotal; ?>
					</td>
					<td>
						<?php echo $imovel->vlPreco; ?>
					</td>
					<td>
						<?php echo $imovel->stVendido; ?>
					</td>
					<td>
						<?php echo $imovel->dataLancto; ?>
					</td>
					<td>
				
					<!-- Botao de Editar Imovel -->
					<td align="center"><a
						href="#modalEditarImovel<?php print_r($imovel->cdImovel); ?>"
						data-toggle="modal"
						data-target="#modalEditarImovel<?php print_r($imovel->cdImovel); ?>"> <span
							class="glyphicon glyphicon-pencil"></span>
					</a>
					<!-- FIM Lista de todos os imoveis -->

					<!-- INICIO Modal de Edicao de Imovel --> 
						<div class="modal fade "
							id="modalEditarImovel<?php print_r($imovel->cdImovel); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Imovel</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="imovel/alterar-imovel.php" id="form-imovel"
											method="Post">
											<div class="form-group">
												<label>Codigo</label> <input name="cdImovel" type="text"
												class="form-control" id="inputcdImovel" placeholder="cdImovel"
													value="<?php echo $imovel->cdImovel; ?>" />
											</div>
											<div class="form-group">
												<label>Endereco</label> <input name="nmEndereco" type="text"
													class="form-control" id="inputnmEndereco" placeholder="nmEndereco"
													value="<?php echo $imovel->nmEndereco; ?>" /> 
											</div>
											<div class="form-group">
												<label>Area Util</label> <input name="nrAreaUtil" type="text"
													class="form-control" id="inputnrAreaUtil" placeholder="nrAreaUtil"
													value="<?php echo $imovel->nrAreaUtil; ?>" /> 
											</div>
											<div class="form-group">
												<label>Area Total</label> <input name="nrAreaTotal" type="text"
													class="form-control" id="inputnrAreaTotal" placeholder="nrAreaTotal"
													value="<?php echo $imovel->nrAreaTotal; ?>" /> 
											</div>
											<div class="form-group">
												<label>Preco</label> <input name="vlPreco" type="text"
													class="form-control" id="inputvlPreco" placeholder="vlPreco"
													value="<?php echo $imovel->vlPreco; ?>" /> 
											</div>
											<div class="form-group">
												<label>Status</label> <input name="stVendido" type="text"
													class="form-control" id="inputstVendido" placeholder="stVendido"
													value="<?php echo $imovel->stVendido; ?>" /> 
											</div>
											<div class="form-group">
												<label>Data de lancamento</label> <input name="dataLancto" type="text"
													class="form-control" id="inputstVendido" placeholder="stVendido"
													value="<?php echo $imovel->dataLancto; ?>" />
											</div>
											<div class="text-center">
												<button type="submit" class="btn btn-primary">Alterar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div> 
					<!-- FIM Modal de Edicao de Imovel -->

					<!-- Botão de Consulta Imovel -->
					<a href="#modalConsultarImovel<?php print_r($imovel->cdImovel); ?>"
					data-toggle="modal"
					data-target="#modalConsultarImovel<?php print_r($imovel->cdImovel); ?>"> 
					<span class="glyphicon glyphicon-search"></span>
					</a>
					<!-- INICIO Modal Consulta de Imovel -->	
						<div class="modal fade "
							id="modalConsultarImovel<?php print_r($imovel->cdImovel); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Imovel</h3>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Codigo</label> <span> <?php print_r($imovel->cdImovel); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Endereco</label> <span> <?php print_r($imovel->nmEndereco); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Area Util</label> <span> <?php print_r($imovel->nrAreaUtil); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Area Total</label> <span> <?php print_r($imovel->nrAreaTotal); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Preco</label> <span> <?php print_r($imovel->vlPreco); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Status</label> <span> <?php print_r($imovel->stVendido); ?>
											</span>
										</div>
										<div class="form-group">
											<label>Data de lancamento</label> <span> <?php print_r($imovel->dataLancto); ?>
											</span>
										</div>
										
									</div>
								</div>
							</div>
						</div> 
						<!-- FIM Modal de Consulta de Imovel -->

					<!-- Botão de Exclusao Imovel -->	
					<a href="#modalExcluirImovel<?php print_r($imovel->cdImovel); ?>"
					data-toggle="modal"
					data-target="#modalExcluirImovel<?php print_r($imovel->cdImovel); ?>"> 
					<span class="glyphicon glyphicon-remove"></span>
					</a>
					<!-- INICIO Modal de Exclusao de Imovel -->
						<div class="modal fade "
							id="modalExcluirImovel<?php print_r($imovel->cdImovel); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Imovel</h3>
										<h5 class="modal-title" id="exampleModalLabel">
											Voce tem certeza que deseja excluir o imovel?
											<?php echo $imovel->cdImovel; ?>
											
										</h5>
										<button type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="imovel/excluir-imovel.php" id="form-imovel"
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
							
												<input
													type="hidden" name="cdImovel" value="<?php echo $imovel->cdImovel; ?>" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					<!-- FIM Modal de Exclusão de Estado -->
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>