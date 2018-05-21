<?php
include('classes/Crud.php');
include('classes/Entrada.php');

$_entrada = new Entrada();

if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['LOGIN'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: login.php"); exit;
  }
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>BRS | Registros</title>

		<meta name="description" content="Source code generated using layoutit.com">
		<meta name="author" content="LayoutIt!">

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1"
		    crossorigin="anonymous">

	</head>
	<style>
		input {
			border-radius: 3px;
		}
                
		td {
			text-align: center;
		}

		th {
			text-align: center;
		}

		button {
			margin-left: 5px;
			cursor: pointer;
		}
	</style>

	<body>

		<div class="container-fluid">

			<form action="controllers/cadastrarSinistro.php" method="post">
				<input value="<?=$_SESSION['ID_PRESTADOR']?>" hidden="" name="ID_PRESTADOR">
				<input value="<?=$_SESSION['LOGIN']?>" hidden="" name="LOGIN">
				<input hidden="" id="ID_ENTRADA" name="ID_ENTRADA">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-11">
								<h4 _ngcontent-c4="" style="font-weight:100;">
									<span _ngcontent-c4="" style="font-weight:600; font-size: 4rem; color: #1565c0">BRS</span> | Registros
								</h4>
							</div>
							<div class="col-md-1">
                                                            <i title="Sair" style="cursor: pointer;color: #1565c0" class="fas fa-sign-out-alt fa-2x" onclick="window.open('controllers/sair.php','_self')"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>
										Data Entrada
									</label>
									<input type="date" class="form-control" id="entrada" name="entrada">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<div class="class col-md-12">
										<label>
											Marca
										</label>
									</div>
									<select id="marca" name="marca">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaMarca() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->MARCA)?>">
												<?=utf8_encode($resposta->MARCA)?>
											</option>

											<?php } ?>

									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Veículo
									</label>
									<input type="text" class="form-control-file" id="veiculo" name="veiculo">

								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Placa
									</label>
									<input type="text" class="form-control-file" id="placa" name="placa">

								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Chassi
									</label>
									<input type="text" class="form-control-file" id="chassi" name="chassi">

								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Ano Veículo
									</label>
									<input type="text" class="form-control-file" id="anoVeiculo" name="anoVeiculo">

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="class row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Ano Modelo
									</label>
									<input type="text" class="form-control-file" id="anoModelo" name="anoModelo">

								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<div class="class col-md-12">
										<label>
											Seguradora
										</label>
									</div>
									<select id="seguradora" name="seguradora">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaSeguradora() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->SEGURADORA)?>">
												<?=utf8_encode($resposta->SEGURADORA)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Cod Sinistro
									</label>
									<input type="text" class="form-control-file" id="codSinistro" name="codSinistro">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<label>
										Num B.O
									</label>
									<input type="text" class="form-control-file" id="numBO" name="numBO">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<div class="col-md-12">
										<label>
											UF Sinistro
										</label>
									</div>
									<select id="ufSinistro" name="ufSinistro">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaUFSinistro() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->UFSINISTRO)?>">
												<?=utf8_encode($resposta->UFSINISTRO)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="class row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<div class="col-md-12">
										<label>
											Cidade do Sinistro
										</label>
									</div>
									<select id="cidadeSinistro" name="cidadeSinistro">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaCidadeSinistro() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->CIDADESINISTRO)?>">
												<?=utf8_encode($resposta->CIDADESINISTRO)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="col-md-12">
										<label>
											Posição
										</label>
									</div>
									<select id="posicao" name="posicao">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaPosicao() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->POSICAO)?>">
												<?=utf8_encode($resposta->POSICAO)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="col-md-12">
										<label>
											UF
										</label>
									</div>
									<select id="uf" name="uf">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaUF() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->UF)?>">
												<?=utf8_encode($resposta->UF)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<div class="col-md-12">
										<label>
											Cidade
										</label>
									</div>
									<select id="cidade" name="cidade">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaCidade() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->CIDADE)?>">
												<?=utf8_encode($resposta->CIDADE)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="class row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">

									<label>
										Numero Processo
									</label>
									<input type="text" class="form-control-file" id="numProcesso" name="numProcesso">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-md-12">
										<label>
											Tipo
										</label>
									</div>
									<select id="tipo" name="tipo">
										<option value="" selected="" disabled="">Selecione</option>
										<?php
                                                                    foreach ($_entrada->selecionaTipo() as $resposta) { ?>
											<option value="<?=utf8_encode($resposta->TIPO)?>">
												<?=utf8_encode($resposta->TIPO)?>
											</option>

											<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">

									<label>
										Situação
									</label>
									<input type="text" class="form-control-file" id="situacao" name="situacao">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="offset-md-9">
								<button type="submit" class="btn btn-success" id="cadastroSinistro" name="cadastroSinistro">
									Salvar
								</button>
								<button class="btn btn-primary" id="atualizarSinistro" name="atualizarSinistro">
									Atualizar
								</button>
								<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>


							</div>
						</div>
                                        </div>
                                </div>
			</form>
			<br>

			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>Número Protocolo</th>
								<th>Dt Entrada</th>
								<th>Marca</th>
								<th>Veículo</th>
								<th>Placa</th>
								<th>Chassi</th>
								<th>Ano do Veículo</th>
								<th>Cód. Sinistro</th>
								<th>Número do B.O</th>
								<th>UF Sinistro</th>
								<th>Cidade Sinistro</th>
								<th>Seguradora</th>
								<th>Posição</th>
								<th>Situação</th>
								<th>Estado</th>
								<th>Cidade</th>
								<th>Número Processo</th>
								<th>Tipo</th>
							</tr>
						</thead>
						<tbody id="tableBody">
							<?php
                                                    $_entrada->setCOLABORADOR($_SESSION['LOGIN']);
                                                    foreach ($_entrada->selecionarSinistros() as $resposta) { ?>
								<tr>
									<td id="idEntrada">
										<?=$resposta->Id_Entrada?>
									</td>
									<td id="dt-entrada">
										<?=$resposta->DATA_ENTRADA?>
									</td>
									<td id="dt-marca">
										<?=utf8_encode($resposta->MARCA)?>
									</td>
									<td id="dt-veiculo">
										<?=utf8_encode($resposta->VEICULO)?>
									</td>
									<td id="dt-placa">
										<?=$resposta->PLACA?>
									</td>
									<td id="dt-chassi">
										<?=$resposta->CHASSI?>
									</td>
									<td id="dt-anoVeiculo">
										<?=$resposta->ANO_VEIC?>
									</td>
									<td id="dt-codSinistro">
										<?=$resposta->COD_SINISTRO?>
									</td>
									<td id="dt-numBO">
										<?=$resposta->NUM_BO?>
									</td>
									<td id="dt-ufSinistro">
										<?=utf8_encode($resposta->UFSINISTRO)?>
									</td>
									<td id="dt-cidadeSinistro">
										<?=utf8_encode($resposta->CIDADESINISTRO)?>
									</td>
									<td id="dt-seguradora">
										<?=utf8_encode($resposta->SEGURADORA)?>
									</td>
									<td id="dt-posicao">
										<?=utf8_encode($resposta->POSICAO)?>
									</td>
									<td id="dt-situacao">
										<?=utf8_encode($resposta->SITUACAO)?>
									</td>
									<td id="dt-uf">
										<?=utf8_encode($resposta->UF)?>
									</td>
									<td id="dt-cidade">
										<?=utf8_encode($resposta->CIDADE)?>
									</td>
									<td id="dt-numProcesso">
										<?=$resposta->NUM_PROCESSO?>
									</td>
									<td id="dt-tipo">
										<?=utf8_encode($resposta->TIPO)?>
									</td>
								</tr>

								<?php } ?>

						</tbody>
					</table>
				</div>
			</div>

			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/scripts.js"></script>
			<script>
				$(document).ready(() => {
					$('#tableBody tr').on('dblclick', function () {
						$('#entrada').val($(this).children("#dt-entrada").html().trim());
						$('#marca').val($(this).children("#dt-marca").html().trim());
						$('#veiculo').val($(this).children("#dt-veiculo").html().trim());
						$('#placa').val($(this).children("#dt-placa").html().trim());
						$('#chassi').val($(this).children("#dt-chassi").html().trim());
						$('#codSinistro').val($(this).children("#dt-codSinistro").html().trim());
						$('#numBO').val($(this).children("#dt-numBO").html().trim());
						$('#ufSinistro').val($(this).children("#dt-ufSinistro").html().trim());
						$('#cidadeSinistro').val($(this).children("#dt-cidadeSinistro").html().trim());
						$('#seguradora').val($(this).children("#dt-seguradora").html().trim());
						$('#posicao').val($(this).children("#dt-posicao").html().trim());
						$('#situacao').val($(this).children("#dt-situacao").html().trim());
						$('#uf').val($(this).children("#dt-uf").html().trim());
						$('#cidade').val($(this).children("#dt-cidade").html().trim());
						$('#numProcesso').val($(this).children("#dt-numProcesso").html().trim());
						$('#tipo').val($(this).children("#dt-tipo").html().trim());

						var anos = $(this).children("#dt-anoVeiculo").html().trim().split("/");
						var fabricacao = anos[0];
						var modelo = anos[1];
                                                
						$('#anoVeiculo').val(fabricacao);
						$('#anoModelo').val(modelo);

						$('#ID_ENTRADA').val($(this).children("#idEntrada").html().trim());
                                                
                                        });
                                        $('#cancelar').on('click',function(){
                                            $('#entrada').val('');
                                            $('#marca').val('');
                                            $('#veiculo').val('');
                                            $('#placa').val('');
                                            $('#chassi').val('');
                                            $('#codSinistro').val('');
                                            $('#numBO').val('');
                                            $('#ufSinistro').val('');
                                            $('#cidadeSinistro').val('');
                                            $('#seguradora').val('');
                                            $('#posicao').val('');
                                            $('#situacao').val('');
                                            $('#uf').val('');
                                            $('#cidade').val('');
                                            $('#numProcesso').val('');
                                            $('#tipo').val('');
                                            $('#anoVeiculo').val('');
                                            $('#anoModelo').val('');

                                        });
				});
			</script>
	</body>

	</html>