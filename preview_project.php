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
							<?php
								$id_projeto = $_GET["id_projeto"];
									$project = mysqli_query($con,"SELECT a.nome_projeto,a.referencia,a.imagens,a.descreva,
									a.tipo_freelancer,DATE_FORMAT(a.tempo,'%d/%m/%y')AS tempo,a.id_usuario,b.nome,b.tipo_freelancer AS tipo_freela,b.foto 
									FROM cria_projeto AS a INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario WHERE id_projeto = '$id_projeto' ");
										$data_project = mysqli_fetch_array($project);
							?>
							<div class="header_create_projects">
								<span><?php echo$data_project["nome_projeto"];?></span>
								<?php include"alert_folder.php";?>
							</div>
							<div class="preview_project">
								<div class="data">
									<img class="photo_contractor" src="<?php echo$data_project['foto'];?>"/>
									<div style="margin-left:130px;margin-top:-45px;">
										<span><?php echo$data_project["nome"];?></span>
										<span style="margin-left:50px;"><?php echo$data_project["tempo"];?></span>
									</div>	
								</div>
									<br>
									<hr>
								<div class="span">	
									<span><?php echo utf8_encode($data_project["descreva"]);?></span>
								</div>	
									<br><br>
									<hr>
								<span class="span"><strong><?php echo $a86;?></strong></span>
									</br>
								<a href="<?php echo$data_project["referencia"];?>" target="_blank" style="color:#1e90ff;">	
									<span class="span"><u><?php echo$data_project["referencia"];?></u></span>
								</a>	
									<br><br>
								<a href="<?php echo$data_project["imagens"];?>" target="_blank" style="color:#1e90ff;">
									<span class="span"><u><?php echo $br;?></u></span>
								</a>
									<br><br>
									<hr>
									<br>
								<script type="text/javascript">
									var project_freela = "<?php echo$data_project['tipo_freelancer'];?>";
									var type_freela = "<?php echo$data_project['tipo_freela'];?>";
									var verf_id = "<?php echo$data_project['id_usuario'];?>";
									var id = "<?php echo$_SESSION['id'];?>";
										$(function(){
											if(id == verf_id){
												$(".verf_id").hide();
												$(".upgrade_freela").show();
											}else if(type_freela !== project_freela){
												$(".verf_id").hide();
												$(".upgrade_freela").show();
											}
										});	
								</script>
							<div class="verf_id">
								<form action="sends_proposal.php" method="post" >
									<label for="value"><?php echo $a94;?></label>
										<input type="text" id="value" name="value" onblur="myValue()" class="proposal"/>
									<script type="text/javascript">	
									function myValue(){
										var result = document.getElementById("value").value;
										$(function(){
											$.post("sends_proposal.php",{result:result},
												function call_bank(data){
													$(".result").html(data);
												})
										});
									}
									</script>
									<label for="deadline"><?php echo $a80;?></label>	
										<input type="text" id="deadline" name="deadline" class="proposal"/>
									<div class="value_end">	
										<span><?php echo $a97;?></span>
											<br>
										<span class="result"></span>
									</div>
										<br><br>
									<br>
									<hr>	
									<br>
									<label for="comment"><?php echo $a95;?></label>
										<textarea rows="2" cols="80" id="comment" name="comment"></textarea>
										<br>
										<input type="hidden"  name="id_project" value="<?php echo$id_projeto;?>"/>	
										<input type="submit" value="<?php echo $a96;?>" class="btn_form btn_proposal"/>	
								</form>
							</div>
							<div  style="display:none;" class="upgrade_freela"> 
								<a href="purchase_upgrade.php" style="color:#000;">
									<img src="imagens/banner_upgrade.png">
								</a>
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