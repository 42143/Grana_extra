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
							<?php $up_proj = $_GET["idpjt"];
								$mypjt = mysqli_query($con,"SELECT nome_projeto,resumo_projeto,referencia,descreva FROM cria_projeto WHERE id_projeto = '$up_proj'");
								$my_proj = mysqli_fetch_array($mypjt);
							?>			
							<div class="header_create_projects"><?php echo $my_proj['nome_projeto'];?>
								<?php include"alert_folder.php";?>
							</div>
								<div class="edit_project">
									<form action="update_project.php" method="post">
										<label for="name_project"><?php echo $a82;?></label>
												<br>
											<input type="text" id="name_project" name="name_project" value="<?php echo $my_proj['nome_projeto'];?>"/>
												<br><br>
												<hr>
										<label for="area_summary"><?php echo $a85;?></label>
												<br>
											<textarea rows="3" cols="80" id="area_summary" name="area_summary"><?php echo utf8_encode($my_proj['resumo_projeto']);?></textarea>
												<br><br>
												<hr>
										<label for="reference"><?php echo $a86;?></label>
												<br>
											<input type="text" id="reference" name="reference" value="<?php echo $my_proj['referencia'];?>"/>
												<br><br>
												<hr>
										<span style="margin-left:25px;float:left;"><?php echo $a87;?></span>	
										<label for="add_imagens" class="btn_add_imagens"><?php echo $a88;?></label>
												<br>
											<input type="file" id="add_imagens" class="add_imagens" name="add_imagens" value=""/>
												<br><br>
												<hr>
										<label for="area_Describe"><?php echo $a89;?></label>
												<br>
											<textarea rows="5" cols="80" id="area" name="area"><?php echo utf8_encode($my_proj['descreva']);?></textarea>
												<br><br>
												<input type="hidden" name="id_projeto" value="<?php echo$up_proj;?>"/>
											<input type="submit" value="<?php echo $a109;?>" class="btn_create_project"/>	
									</form>
								</div>	
						</div>	
					</div>			
				</div>
			</div>		
		</div>	
		<?php include "header_footer.php";?> 
	</body>
</html>	