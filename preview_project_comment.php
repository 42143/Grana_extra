<?php include"config.php";
	session_start();
	if(!isset($_SESSION["id"])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!--CSS-->
		<link rel="shortcut icon" href="imagens/favicon.png">
		<link rel="stylesheet" href="css/style_panel.css">
		<!--Jquery-->
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/common_panel.js"></script>
	</head>
	<body>
		<div class="main">
			<div class="Screen Screen1">
			<?php
					$array_language = array("1" => "language/pt_br.php","2" => "language/en_us.php");
								if(!isset($_GET["language"])){
									$_SESSION["language"] = "1";
										if(array_key_exists($_SESSION["language"],$array_language)){
											include $array_language[$_SESSION["language"]];
										}
								}else if(isset($_GET["language"])){
									$_SESSION["language"] = $_GET["language"];
										if(array_key_exists($_SESSION["language"],$array_language)){
											include $array_language[$_SESSION["language"]];
										}
								}
				?>
				<div class="content">
					<div class="means">	
						<!--panel_profile-->
						<?php include"panel_profile.php";?>
						<div class="panel create_projects">
							<div class="header_create_projects">
								<?php 
									$id_projeto = $_GET["idpjt"];
									$projeto = mysqli_query($con,"SELECT a.nome_projeto,a.referencia,a.imagens,a.descreva,
									a.tipo_freelancer,DATE_FORMAT(a.tempo,'%d/%m/%y')AS tempo,b.nome,b.foto FROM cria_projeto AS a 
									INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario WHERE id_projeto = '$id_projeto'");
										$data_proj = mysqli_fetch_array($projeto);
								?>
								<span><?php echo$data_proj["nome_projeto"];?></span>
								<?php include"alert_folder.php";?>
							</div>
							<div class="preview_project">
								<div class="data">
									<img class="photo_contractor" src="<?php echo$data_proj["foto"];?>">
									<div style="margin-left:130px;margin-top:-45px;">
										<span><?php echo$data_proj["nome"];?></span>
										<span style="margin-left:50px;"><?php echo$data_proj["tempo"];?></span>
									</div>	
								</div>
									<br>
									<hr>
								<div class="span">	
									<span><?php echo$data_proj["descreva"];?></span>
								</div>	
									<br>
									<hr>
								<span class="span"><strong>Referências</strong></span>
									</br>
								<span class="span"><?php echo$data_proj["referencia"];?></span>
									<br>
								<span class="span"><?php echo$data_proj["imagens"];?></span>
								<div class="comment">
									<?php $comment = mysqli_query($con,"SELECT a.id_orcamento,a.valor,a.prazo,a.comentarios,b.nome,b.foto,c.id_projeto,c.id_usuario FROM orcamento AS a 
											INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.id_projeto = '$id_projeto'");
												while($d_comment = mysqli_fetch_array($comment)){?>
													<div class='cashier_alert'>
																<div class='photo_contractor' style='width:50px;height:50px;border-radius:50px;background:#F7F8F9;background-repeat:no-repeat;background-position:center;'>
																	<img style='width:50px;height:50px;border-radius:50px;background:#F7F8F9;background-repeat:no-repeat;background-position:center;' src="<?php echo$d_comment['foto'];?>"/>								
																</div>
																<span class='name_user'><?php echo$d_comment['nome'];?></span>
																<hr>
																<span><?php echo$d_comment['comentarios'];?></span>
																<br>
																<span>Valor proposta <u><?php echo$d_comment['valor'];?></u> | Prazo <u><?php echo$d_comment['prazo'];?></u></span>
																<hr>
																<form action='sends_proposal.php' method='post'>
																	<input type='hidden' name='accept' value='1'/>
																	<input type='hidden' name='orcamento' value='<?php echo$d_prop["id_orcamento"];?>'/>
																	<input class='btn_gh' type='submit' value='Aceitar'/>
																</form>
																<form action='sends_proposal.php' method='post'>
																	<input type='hidden' name='pending' value='2'/>
																	<input type='hidden' name='orcamento' value='<?php echo$d_prop["id_orcamento"];?>'/>
																	<input class='btn_hg' type='submit' value='Pendente'/>
																</form>
																<form action='sends_proposal.php' method='post'>
																	<input type='hidden' name='refuse' value='3'/>
																	<input type='hidden' name='orcamento' value='<?php echo$d_prop["id_orcamento"];?>'/>
																	<input class='btn_gh' type='submit' value='recusar'/>
																</form>
																<br><hr>
													</div>
												<?php	
												}
												?>	
								</div>
							</div>	
						</div>	
					</div>			
				</div>
			</div>		
		</div>	
		<?php include "header_footer.php";?> 
	</body>
</html>	