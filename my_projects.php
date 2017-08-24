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
								<span>Meus projetos</span>
								<?php include"alert_folder.php";?>
							</div>
							<div class="my_projects">
								<h3><center>Meu projetos</center></h3>
								<?php $mypjt = mysqli_query($con,"SELECT id_projeto,nome_projeto,tempo FROM cria_projeto WHERE id_usuario = '$id' ORDER BY tempo DESC");
									while($my_proj = mysqli_fetch_array($mypjt)){?>
										<div style="width:250px;float:left;margin-left:20px;"><?php $cort_nome = substr($my_proj["nome_projeto"],0,25); echo$cort_nome?></div>
										<span style='font-size:15px;margin-right:45px;'><?php echo $my_proj["tempo"];?></span>
										<a href='update_project.php?idpjt=<?php echo $my_proj["id_projeto"];?>'><span class='btn'>Excluir</span>
										<a href='edit_project.php?idpjt=<?php echo $my_proj["id_projeto"];?>'><span class='btn'><?php echo $a66;?></span></a>
										<hr>
									<?php	
									}
									?>	
								<h3><center><?php echo $a67;?></center></h3>
								<?php 
									$id = $_SESSION["id"];
									$accept = mysqli_query($con,"SELECT a.id_orcamento_ind,a.valor,a.prazo,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,a.flag_proposta,b.id_usuario,b.nome,b.foto,c.nome_projeto FROM orcamento AS a 
								INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.flag_proposta = '1' AND c.id_usuario = '$id' ORDER BY a.tempo DESC");
										while($d_accept = mysqli_fetch_array($accept)){?>
											<a href='preview_profile_freelar.php?id=<?php echo$d_accept['id_usuario'];?>'><span style='margin-left:80px;'><?php echo$d_accept["nome"];?></span></a>
											<span style='font-size:15px;'><b><?php echo$d_accept["nome_projeto"];?></b>&nbsp;&nbsp;<?php echo$d_accept["tempo"];?></span>
												<br>
											<span style='font-size:15px;margin-right:10px;margin-left:80px;'>Oferta  do serviço:&nbsp;R$<?php echo$d_accept["valor"];?> | Duração estimada:&nbsp;<?php echo$d_accept["prazo"];?></span>
											<a href="payment_method.php?id=<?php echo$d_accept['id_orcamento_ind'];?>">
												<span class='btn'><?php echo $a72;?></span>
											</a>
											<span class='btn btn_cancel'><?php echo $a73;?></span>
												<?php $value_arrey = $d_accept['id_orcamento_ind'].$id;?>
											<input type="hidden" id="myJustific" value="<?php echo$value_arrey;?>"/>
											<a href='preview_profile_freelar.php?id=<?php echo$d_accept['id_usuario'];?>'>
												<div class="image_photo">
													<img class='photo_freelar' src="<?php echo$d_accept['foto'];?>"/>
												</div>	
											</a>
											<hr>
											<script>
												$(function(){
													var myJustication = document.getElementById("myJustific").value;
													$(".btn_cancel").click(function(){
														$(".justify_cancellation,.mask_black").show();
														$.post("justification.php",{myJustication:myJustication},
															function call_back(data){
																$(".justify_cancellation").html(data);
															}
														)
													});	
												});
											</script>
									<?php
										}
										?>	
								<h3><center><?php echo $a68;?></center></h3>
								<?php $pending = mysqli_query($con,"SELECT a.id_orcamento,a.valor,a.prazo,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,a.flag_proposta,b.id_usuario,b.nome,b.foto,c.nome_projeto FROM orcamento AS a 
								INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.flag_proposta = '2' AND c.id_usuario = '$id' ORDER BY a.tempo DESC");
										while($d_pending = mysqli_fetch_array($pending)){?>
											<a href='preview_profile_freelar.php?id=<?php echo$d_pending['id_usuario'];?>'><span style='margin-left:80px;'><?php echo$d_pending["nome"];?></span></a>
											<span style='font-size:15px;'><b><?php echo$d_pending["nome_projeto"];?></b>&nbsp;&nbsp;<?php echo$d_pending["tempo"];?></span>
												<br>
											<span style='font-size:15px;margin-right:10px;margin-left:80px;'><?php echo $a70.":";?>&nbsp;R$<?php echo$d_pending["valor"];?> | <?php echo $a71.":";?>&nbsp;<?php echo$d_pending["prazo"];?></span>
											<a href="update_project.php?idref=<?php  echo$d_pending['id_orcamento'];?>">
												<span class='btn'><?php echo $a41;?></span>
											</a>
											<a href="update_project.php?idacc=<?php  echo$d_pending['id_orcamento'];?>">	
												<span class='btn'><?php echo $a74;?></span>
											</a>	
											<a href='preview_profile_freelar.php?id=<?php echo$d_pending['id_usuario'];?>'>
												<div class="image_photo">
													<img class='photo_freelar' src="<?php echo$d_pending['foto'];?>"/>
												</div>	
											</a>
											<hr>
									<?php		
										}
										?>	
								<h3><center><?php echo $a69;?></center></h3>
								<?php $refused = mysqli_query($con,"SELECT a.id_orcamento,a.valor,a.prazo,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,a.flag_proposta,b.id_usuario,b.nome,b.foto,c.nome_projeto FROM orcamento AS a 
								INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.flag_proposta = '3' AND c.id_usuario = '$id' ORDER BY a.tempo DESC");
										while($d_refused = mysqli_fetch_array($refused)){?>
											<a href='preview_profile_freelar.php?id=<?php echo$d_refused['id_usuario'];?>'><span style='margin-left:80px;'><?php echo$d_refused["nome"];?></span></a>
											<span style='font-size:15px;'><b><?php echo$d_refused["nome_projeto"];?></b>&nbsp;&nbsp;<?php echo$d_refused["tempo"];?></span>
												<br>
											<span style='font-size:15px;margin-right:10px;margin-left:80px;'><?php echo $a70.":";?>&nbsp;R$<?php echo$d_refused["valor"];?> | <?php echo $a71.":";?>&nbsp;<?php echo$d_refused["prazo"];?></span>
											<a href="update_project.php?idref=<?php  echo$d_refused['id_orcamento'];?>">
												<span class='btn'>Excluir</span>
											</a>
											<a href="update_project.php?idacc=<?php  echo$d_refused['id_orcamento'];?>">	
												<span class='btn'><?php echo $a41;?></span>
											</a>	
											<a href='preview_profile_freelar.php?id=<?php echo$d_refused['id_usuario'];?>'>
												<div class="image_photo">
													<img class='photo_freelar' src="<?php echo$d_refused['foto'];?>"/>
												</div>	
											</a>
											<hr>
									<?php
										}
										?>	
							</div>								
						</div>	
					</div>			
				</div>
			</div>
			<div class="Screen Screen2">
				<div class="content">
					<div class="mask_black"></div>
						<div class="means">
							<div class="justify_cancellation"></div>
						</div>		
				</div>
			</div>
		</div>	
		<?php include "header_footer.php";?> 
	</body>
</html>	