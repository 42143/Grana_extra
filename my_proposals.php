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
								<span><?php echo $a32;?></span>
								<?php include"alert_folder.php";?>
							</div>
							<div class="my_proposals">
								<h3><center><?php echo $a75;?></center></h3>
								<?php 
									$id = $_SESSION["id"];
								$mypro_accept = mysqli_query($con,"SELECT a.id_orcamento,a.valor,a.prazo,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,b.id_projeto,b.nome_projeto FROM orcamento AS a 
								INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE a.id_usuario = '$id' AND a.flag_proposta = '1' ORDER BY a.tempo DESC"); 
									while($prop_accept = mysqli_fetch_array($mypro_accept)){?>
										<span style='font-size:15px;'><b><?php echo$prop_accept["nome_projeto"];?></b>&nbsp;&nbsp;<?php echo$prop_accept["tempo"];?></span>
											<br>
										<span style='font-size:15px;margin-right:10px;'><?php echo $a78.":";?>:&nbsp;R$<?php echo$prop_accept["valor"];?>&nbsp;|&nbsp;<?php echo $a80.":";?>&nbsp;<?php echo$prop_accept["prazo"];?></span>
										<span class='btn'><?php echo $a73;?></span>
										<!---<a href="conclusion.php?pj=<?php //echo$prop_accept['id_projeto'];?>">-->
											<span class='btn conclusion'><?php echo $a79;?></span>
										<!--</a>--->	
										<hr>
										<script>
											$(function(){
												var idp = "<?php echo$prop_accept['id_projeto'];?>"; 
												$(".conclusion").click(function(){
													$(".add_conclusion,.mask_black").show();
														$.post("conclusion.php",{idp:idp},
															function call_back(data){
																$(".add_conclusion").html(data);
															});
												});
											});
										</script>
								<?php	
									}
									?>									
								<h3><center><?php echo $a76;?></center></h3>
								<?php 
									$id = $_SESSION["id"];
								$mypro_pending = mysqli_query($con,"SELECT a.id_orcamento,a.valor,a.prazo,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,b.nome_projeto FROM orcamento AS a 
								INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE a.id_usuario = '$id' AND a.flag_proposta = '2' ORDER BY a.tempo DESC"); 
									while($prop_pending = mysqli_fetch_array($mypro_pending)){?>
										<span style='font-size:15px;'><b><?php echo$prop_pending["nome_projeto"];?></b>&nbsp;&nbsp;<?php echo$prop_pending["tempo"];?></span>
											<br>
										<span style='font-size:15px;margin-right:10px;'><?php echo $a78.":";?>&nbsp;R$<?php echo$prop_pending["valor"];?>&nbsp;|&nbsp;<?php echo $a80.":";?>&nbsp;<?php echo$prop_pending["prazo"];?></span>
										<a href="update_project.php?idproref=<?php  echo$prop_pending['id_orcamento'];?>">
											<span class='btn'><?php echo $a41;?></span>
										</a>	
										<span class='btn'></span>
										<hr>
								<?php	
									}
									?>	
								<h3><center><?php echo $a77;?></center></h3>
								<?php 
									$id = $_SESSION["id"];
								$mypro_refused = mysqli_query($con,"SELECT a.id_orcamento,a.valor,a.prazo,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,b.nome_projeto FROM orcamento AS a 
								INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE a.id_usuario = '$id' AND a.flag_proposta = '3' ORDER BY a.tempo DESC"); 
									while($prop_refused = mysqli_fetch_array($mypro_refused)){?>
										<span style='font-size:15px;'><b><?php echo$prop_refused["nome_projeto"];?></b>&nbsp;&nbsp;<?php echo$prop_refused["tempo"];?></span>
											<br>
										<span style='font-size:15px;margin-right:10px;'><?php echo $a78.":";?>&nbsp;R$<?php echo$prop_refused["valor"];?>&nbsp;|&nbsp;<?php echo $a80.":";?>&nbsp;<?php echo$prop_refused["prazo"];?></span>
										<a href="update_project.php?idproref=<?php  echo$prop_refused['id_orcamento'];?>">
											<span class='btn'><?php echo $a41;?></span>
										</a>	
										<span class='btn'></span>
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
							<div class="add_conclusion"></div>
						</div>		
				</div>
			</div>	
		</div>	
		<?php include "header_footer.php";?> 
	</body>
</html>	