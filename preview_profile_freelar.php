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
								<span>Perfil do freelar</span>
								<?php include"alert_folder.php";?>
							</div>
								<?php 
									$id = $_GET["id"];
									$d_perf = mysqli_query($con,"SELECT a.habilidade,a.conte_sobre,a.conte_experiencia,b.nome,b.foto FROM editar_perfil AS a 
									INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario WHERE a.id_usuario = '$id' ");
										$perf_prof = mysqli_fetch_array($d_perf);
								?>		
							<div class="preview_profile_freelar">
								<div class="data">
									<img class="photo_freelar" src="<?php echo$perf_prof['foto'];?>"/>
									<div style="margin-left:130px;margin-top:-45px;">
										<span><?php echo$perf_prof["nome"];?></span>
										<div class="reputation" style="margin-left:250px;margin-top:-20px;">
											<svg width="200px" height="49px" >
												<style type="text/css">
													.st0{fill:#FF0000;}
													.st1{fill:#FBB03B;}
													.st2{fill:#00BA4A;}
													.st3{fill:#999999;}
													.st4{fill:#E6E6E6;}
													.st5{fill:#CCCCCC;}
												</style>
												<path class="st0" d="M2.6,23.9H66v8H2.8c-1.5,0-2.8-1-2.8-2.2V26C0,24.8,1.2,23.9,2.6,23.9z"/>
												<rect x="66.1" y="23.9" class="st1" width="66" height="8"/>
												<path class="st2" d="M132,23.9h63c1.6,0,3,1.1,3,2.4v3.4c0,1.2-1.2,2.2-2.8,2.2H132V23.9z"/>
												<g>
													<?php include"wire_reputation_freelar.php"?>
												</g>
											</svg>
												<?php 
													$d_bom = mysqli_query($con,"SELECT bom FROM reputacao WHERE id_usuario = '$id'");
													$value_bom = mysqli_num_rows($d_bom);
												?>			
												<span style="font-size:30px;float:right;margin-right:40px;margin-top:-120px;"><?php if($value_bom < 10){echo"0".$value_bom;}else{echo$value_bom;}?></span>
													<br>
												<span style="font-size:15px;float:right;margin-top:-90px;">Trabalhos realizados</span>
										</div>
									</div>	
								</div>
									<br>
									<hr>
								<div class="span">
									<span><strong>Sobre o freelar</strong><span>
										<br>
									<span><?php echo$perf_prof["conte_sobre"];?></span>
								</div>
									<br>
									<hr>
									<br>
								<div class="span">	
									<span><strong>Experiencia profissonal</strong><span>
										<br>
									<span><?php echo$perf_prof["conte_experiencia"];?></span>
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