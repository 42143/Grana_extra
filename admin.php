<?php include"config.php";
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:login_admin.php");
	}
?>
<!doctype hmlt>
<html>
		<head>
			<title>Pagina de Administrado</title>
			<meta charset="utf-8"/>
			<link rel="stylesheet" href="css/style_admin.css" type="text/css"/>
			<script src="js/jquery-1.11.1.min.js"></script>
			<link rel="shortcut icon" href="imagens/favicon.png">
		</head>
	<body>
		<div class="content">
			<div class="admin">
				<div class="mean">
					<div class="head">
						<img src="imagens/logo_admin.png" style="margin-top:-1px;margin-bottom:10px;"/>	
					</div>
					<div class="fixed_caixa">	
							<div class="caixa">
								<div class="header">
									<span>Configuração de lista de habilidades</span>
								</div>
								<form action="exe_admin.php" method="post">
										<br>
														<input type="submit" value="adicionar habilidade" class="btn"/>
									Adicionar Habilidade<input type="text" name="ability" placeholder="Digite aqui uma habilidade" class="campo"/>
															<hr style="margin-bottom:10px;width:798px;">
														<input type="submit" value="Excluir habilidade" class="btn"/>	
									Excluir Habilidade <select id="ability" name="delet_ability" class="campo">
																<option value="">Seleciona as habilidade</option>
																	<?php 
																		$exe_ability = mysqli_query($con,"SELECT * FROM habilidade");
																		while($ability = mysqli_fetch_array($exe_ability)){?>
																<option value="<?php echo $ability['id_habilidade'];?>"><?php echo $ability['habilidade'];?></option>
																		<?php
																		}
																		?>
															</select>
								</form>
							</div>
								<div class="caixa">
									<div class="header">
										<span>Configurações de lista de  bancos</span>
									</div>
										<br>	
									<form action="exe_admin.php" method="post">
														<input type="submit" value="adicionar banco" class="btn"/>
										Adicionar banco	<input type="text" name="bank" placeholder="Digite aqui um banco" class="campo"/>
															<hr style="margin-bottom:10px;width:798px;">
														<input type="submit" value="Excluir banco" class="btn"/>	
										Excluir banco	<select id="bank" class="campo" name="delet_bank">
														<option value="">Seleciona o banco</option>
															<?php 
																$exe_bank = mysqli_query($con,"SELECT * FROM banco");
																while($bank = mysqli_fetch_array($exe_bank)){?>
														<option value="<?php echo $bank['id_banco'];?>"><?php echo $bank['banco'];?></option>
																<?php
																}
																?>
													</select>
									</form>
								</div>
								<div class="caixa">
									<div class="header">
										<span>Configurações de lista de  serviços</span>
									</div>
										<br>
									<form action="exe_admin.php" method="post">
															<input type="submit" value="adicionar serviço"class="btn"/>
										Adicionar serviço	<input type="text" name="services" placeholder="Digite aqui um serviço" class="campo" />
																<hr style="margin-bottom:10px;width:798px;">
														<input type="submit" value="Excluir banco" class="btn"/>		
										Excluir serviço	<select id="services" class="campo" name="delet_services">
																<option value="">Seleciona um serviço</option>
																	<?php 
																		$exe_services = mysqli_query($con,"SELECT * FROM servico");
																		while($services = mysqli_fetch_array($exe_services)){?>
																<option value="<?php echo $services['id_servico'];?>"><?php echo $services['servicos'];?></option>
																		<?php
																		}
																		?>
															</select>
									</form>
								</div>
								<div class="caixa caixa_adm">
									<div class="header">
										<span>Adicionar Funcionario</span>
									</div>
										<br>
									<form action="exe_admin.php" method="post">
															<input type="submit" value="adicionar funcionário"class="btn btn_fun"/>	
															<input type="text" name="admin" placeholder="Digite o nome do funcionario" class="campo" />
														Nome Funcionario	
															<br>	
															<input type="password" name="senha_admin" placeholder="Digite a Senha" class="campo" />
															<br>
														Senha	
														<select id="services" class="campo" name="type_admin" style="margin-right:185px;">
															<option value="">Seleciona um tipo de funcionario</option>
															<option value="1">Administrado</option>	
															<option value="2">Editor</option>	
														</select>
															<hr style="margin-bottom:10px;width:798px;">
															<input type="submit" value="Excluir funcionário" class="btn"/>
										Excluir Funcionario	<select id="services" class="campo" name="delet_services">
																	<option value="">Seleciona o funcionario</option>
																		<?php 
																			$exe_services = mysqli_query($con,"SELECT * FROM admin");
																			while($services = mysqli_fetch_array($exe_services)){?>
																	<option value="<?php echo $services['id_admin'];?>"><?php echo $services['usuario'];?></option>
																			<?php
																			}
																			?>
																</select>
									</form>
								</div>
								<script>
									var admin = "<?php echo $_SESSION['typeadmin'];?>";
										//alert(admin);
										if(admin == 1 ){
											$(".caixa_adm").show();
										}
								</script>
					</div>	
							<div class="fixd_right">
								<div class="caixas_right">
										<div class="caixa cx_right_user">
											<div class="header">
												<span>Usuario</span>
											</div>
												<?php 
													$id = $_SESSION["admin"];
													$exe = mysqli_query($con,"SELECT usuario,flag_admin FROM admin WHERE id_admin = '$id'");
														$datos = mysqli_fetch_array($exe);
												?>
											<center>
													<br>
												<span style=""><?php if($datos["flag_admin"] == 1){echo"Administrado";}else{echo"Editor";}?></span>	
													<br><br>
												Nome:<span style=""><?php echo $datos["usuario"];?></span>	
											</center>	
										</div>
											<div class="caixa cx_right_cout">
												<div class="header head_cout">
													<span>Preço tipo de conta</span>
												</div>
													<br>
												<div class="valor_classic">
													<span style="margin-left:15px;">Valor atual conta Classic:</span>
														<br>
														<?php
															$value_upgrade_classic = mysqli_query($con,"SELECT id_upgrade,valor FROM valor_upgrade WHERE id_upgrade = '1'");
																$data_upgrade_classic = mysqli_fetch_array($value_upgrade_classic);
														?>
													<form action="exe_admin.php" method="post">
														Adicionar&nbsp;<input type="text" name="valor_plano_classic" placeholder="R$<?php echo$data_upgrade_classic["valor"];?>" class="campo_plano"/>
																			<br>
																	   <input type="submit" value="Adicionar" class="btn"/>
													</form>
														<hr style="width:328px;">	
												</div>
														<br>
												<div class="valor_premuim">
													<span style="margin-left:15px;">Valor atual conta Premuim:</span>
														<br>
														<?php
															$value_upgrade_premuim = mysqli_query($con,"SELECT id_upgrade,valor FROM valor_upgrade WHERE id_upgrade = '2'");
																$data_upgrade_premuim = mysqli_fetch_array($value_upgrade_premuim);
														?>
													<form action="exe_admin.php" method="post">
														Adicionar&nbsp;<input type="text" name="valor_plano_premuim" placeholder="R$<?php echo$data_upgrade_premuim["valor"];?>" class="campo_plano"/>
																		<br>
																	   <input type="submit" value="Adicionar" class="btn"/>
													</form>
														<hr style="width:328px;margin-bottom:25px;">
													<center>	
														<span>Cores de Aprovação</script>
													</center>	
															<ul style="list-style:square;margin-top:40px;">
																<li style="float:left;margin-left:40px;">Aprovado</li>
																<li style="float:left;margin-left:20px;">Tranferido</li>
																<li style="float:left;margin-left:20px;">Devolução</li>
															</ul>
												</div>	
											</div>
								</div>
							</div>	
								<div class="relatorios">
									<div class="header">
										<span>Relatorios dos boletos</span>
									</div>
										<div class="header_tema">
												<div class="cols" style="margin-left:15px;">Usuario a pagar</div>	
												<div class="cols">Status do boleto</div>	
												<div class="cols">Data</div>	
												<div class="cols">Vencimento</div>	
												<div class="cols">Valor</div>		
												<div class="cols">Usuario a receber</div>	
												<div class="cols">Aprovado</div>	
												<div class="cols">Pago</div>	
										</div>
										<div class="table">	
											<?php 
												$d_boleto = mysqli_query($con,"SELECT a.id_boleto,a.data_boleto,a.vencimento,a.flag_status,b.nome,c.valor,c.prazo,d.nome 
												AS n_receber,e.nome_projeto FROM boleto AS a INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN orcamento 
												AS c ON a.id_orcamento = c.id_orcamento INNER JOIN cadastro AS d ON c.id_usuario = d.id_usuario INNER JOIN cria_projeto 
												AS e ON c.id_projeto = e.id_projeto ORDER BY a.vencimento ");
												while($value_boleto = mysqli_fetch_array($d_boleto)){?>
													<div class='rows' style="<?php if($value_boleto["flag_status"] == 1){echo"background:#FFA64D;";}else if($value_boleto["flag_status"] == 2){echo"background:#B9FF73;";}?>">
															<div class='cols' style='margin-left:15px;'><?php $nome = substr($value_boleto["nome"],0,19);echo$nome;?></div>
															
															<div class='cols' id="btnSelect">
																<?php if($value_boleto["flag_status"] == 1){echo"Aprovado";}else if($value_boleto["flag_status"] == 2){echo"Pago";}else{echo"Em processo";};?>
															</div>
															<div class='cols'><?php echo$value_boleto["data_boleto"];?></div>	
															<div class='cols'><?php echo$value_boleto["vencimento"];?></div>	
															<div class='cols'><?php echo$value_boleto["valor"];?></div>		
															<div class='cols'><?php $n_rec = substr($value_boleto["n_receber"],0,19);echo$n_rec;?></div>
															<form action="exe_admin.php" method="post">
																<input type="hidden" name="flag_status" value="1"/>
																<input type="hidden" name="idboleto" value="<?php echo$value_boleto["id_boleto"];?>"/>
																<div class='cols'><input type="submit" value="Aprovado" class="btn_flag aprovado"/></div>
															</form>
															<form action="exe_admin.php" method="post">
																<input type="hidden" name="flag_status" value="2"/>
																<input type="hidden" name="idboleto" value="<?php echo$value_boleto["id_boleto"];?>"/>
																<div class='cols'><input type="submit" value="Pago" class="btn_flag pago"/></div>
															</form>
															<script>
																var row = "<?php echo$value_boleto['id_boleto'];?>";
																var status = "<?php echo$value_boleto['flag_status'];?>"; 
																$(function(){
																	if(status == 1){
																		$('.'+row).css({'background':'#009900'});
																	}else if(status == 2){
																		$('.'+row).css({'background':'#ff6600'});
																	}
																});
															</script>
													</div>
											<?php		
											}	
											?>	
										</div>	
								</div>
								<!--<div class="relatorios">
									<div class="header">
										<span>Relatorios dos cartões</span>
									</div>
										<div class="header_tema">
												<div class="cols" style="margin-left:15px;">Usuario a pagar</div>	
												<div class="cols">Bandeira do cartão</div>	
												<div class="cols">Data</div>	
												<div class="cols">Vencimento</div>	
												<div class="cols">Valor</div>	
												<div class="cols">Nome do serviço</div>	
												<div class="cols">Prazo do serviço</div>	
												<div class="cols">Usuario a receber</div>
										</div>
										<div class="table">	
											<?php /*for($rb = 1;$rb < 20;$rb ++){
													echo"<div class='rows'>
															<div class='cols' style='margin-left:15px;'>Usuario a pagar</div>	
															<div class='cols'>Status do boleto</div>	
															<div class='cols'>Data</div>	
															<div class='cols'>Vencimento</div>	
															<div class='cols'>Valor</div>	
															<div class='cols'>Nome do serviço</div>	
															<div class='cols'>Prazo do serviço</div>	
															<div class='cols'>Usuario a receber</div>
													</div>";
											}*/	?>	
										</div>	
								</div>-->
				</div>					
			</div>
		</div>
	</body>
</html>	