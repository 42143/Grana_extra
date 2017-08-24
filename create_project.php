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
							<div class="header_create_projects"><?php echo $a81;?>
								<?php include"alert_folder.php";?>
							</div>
								<form action="new_create_project.php" method="post" enctype="multipart/form-data">
									<label for="name_project"><?php echo $a82;?></label>
											<br>
										<input type="text" id="name_project" name="name_project"/>
											<br><br>
											<hr>
									<label for="name_project"><?php echo $a83;?></label>
											<br>
										<select name="services">
											<option value=""><?php echo $a84;?></option>
											<?php 	
												$d_services = mysqli_query($con,"SELECT * FROM servico");
													while($services = mysqli_fetch_array($d_services)){?>
											<option value="<?php echo $services['id_servico'];?>"><?php echo $services['servicos'];?></option>
												<?php	
													} 
													?>
										</select>
											<br><br>
											<hr>		
									<label for="area_summary"><?php echo $a85;?></label>
											<br>
										<textarea rows="3" cols="80" id="area_summary" name="area_summary"></textarea>
											<br><br>
											<hr>
									<label for="reference"><?php echo $a86;?></label>
											<br>
										<input type="text" id="reference" name="reference"/>
											<br><br>
											<hr>
									<span style="margin-left:25px;float:left;"><?php echo $a86;?></span>	
									<label for="add_imagens" class="btn_add_imagens"><?php echo $a88;?></label>
											<br>
										<input type="file" id="add_imagens" class="add_imagens" name="add_imagens" accept="image/*"/>
											<br><br>
											<hr>
									<label for="area_Describe"><?php echo $a89;?></label>
											<br>
										<textarea rows="5" cols="80" id="area" name="desc_project"></textarea>
											<br><br>
											<hr>
									<label for="btn_account_basic">
										<input type="radio" id="btn_account_basic" name="freelar_escolhar" value="1"/>
										<div class="freelar_escolhar btn_account_basic">
											<span style="font-size:20px;margin-left:30px;"><strong>Freela Basic</strong></span>
											<div class="image">
												<img class="icon0" src="imagens/icon0.png"/>
												<img class="icon3_white0" src="imagens/icon3.png"/>
											</div>
											<hr style="margin-top:20px;width:182px;">	
											<span><?php echo $a90;?></span>
										</div>
									</label>
									<label for="btn_account_classic">
										<input type="radio" id="btn_account_classic" name="freelar_escolhar" value="2"/>
										<div class="freelar_escolhar btn_account_classic">
											<span style="font-size:20px;margin-left:30px;"><strong>Freela Classic</strong></span>
											<div class="image">
												<img class="icon1" src="imagens/icon1.png"/>
												<img class="icon3_white1" src="imagens/icon3.png"/>
											</div>
											<hr style="margin-top:20px;width:182px;">
											<span><?php echo $a91;?></span>	
										</div>
									</label>
									<label for="btn_account_premier">
										<input type="radio" id="btn_account_premier" name="freelar_escolhar" value="3"/>
										<div class="freelar_escolhar btn_account_premier">
												<span style="font-size:20px;margin-left:30px;"><strong>Freela Premiun</strong></span>
												<div class="image">	
													<img class="icon2" src="imagens/icon2.png"/>
													<img class="icon3_white2" src="imagens/icon3.png"/>
												</div>
											<hr style="margin-top:20px;width:182px;">
											<span><?php echo $a92;?></span>
										</div>
									</label>		
										<input type="submit" value="<?php echo $a93;?>" class="btn_create_project"/>	
								</form>
						</div>	
					</div>			
				</div>
			</div>		
		</div>	
		<?php include "header_footer.php";?> 
	</body>
</html>	