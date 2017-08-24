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
									$id_orcamento = $_GET["id"];
										$d_prop = mysqli_query($con,"SELECT a.valor,a.prazo,a.comentarios,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,a.flag_proposta,b.nome,b.foto,c.nome_projeto FROM orcamento AS a 
										INNER JOIN cadastro AS b  INNER JOIN cria_projeto AS c ON a.id_usuario = b.id_usuario AND a.id_projeto = c.id_projeto WHERE a.id_orcamento_ind ='$id_orcamento'");
											$prop = mysqli_fetch_array($d_prop);
									?>		
								<span><?php echo$prop['nome_projeto'];?></span>
								<?php include"alert_folder.php";?>
							</div>
							<div class="payment_method">
								<div class="data">
									<img class="photo_freelar" src="<?php echo$prop['foto'];?>">
									<div style="margin-left:130px;margin-top:-45px;">
										<span><?php echo$prop["nome"];?></span>
										<span style="margin-left:50px;"><?php echo$prop["tempo"];?></span>
									</div>	
								</div>
									<br>
									<hr>
								<center>	
									<span><?php echo $a70.":";?><strong>&nbsp;R$<?php echo$prop["valor"];?></strong> | <?php echo $a71.":";?>&nbsp;<strong><?php echo$prop["prazo"];?></strong></span>	
								</center>	
									</br>
								<div class="span">	
									<span><?php echo$prop["comentarios"];?></span>
								</div>	
									<br>
									<hr>
								<div class="payment_method_choice">
									<h3><?php echo $a98;?></h3>
									<ul>
										<li><?php echo $a99;?></li>
										<li><?php echo $a100;?></li>
									</ul>
									<svg class="svg_card" style="width:105px;height:77px;">
										<style type="text/css">
											.btn_card{fill:#000;}
										</style>
										<g class="g_btn_card">
											<path class="btn_card" d="M52.2,1.7c14.5,0,29.1,0,43.6,0c4.3,0,6.9,2.6,6.9,6.9c0,19.5,0,38.9,0,58.4c0,4.3-2.6,6.9-6.9,6.9c-29.1,0-58.1,0-87.2,0
												c-4.3,0-6.9-2.6-6.9-6.9c0-19.5,0-38.9,0-58.4c0-4.3,2.6-6.9,6.9-6.9C23.1,1.7,37.7,1.7,52.2,1.7z M95.4,37.8
												c-28.9,0-57.7,0-86.5,0c0,0.4,0,0.8,0,1.2c0,8,0,16,0,24c0,2.5,1.1,3.6,3.5,3.6c26.5,0,52.9,0,79.4,0c2.4,0,3.6-1.1,3.6-3.6
												c0-6.2,0-12.3,0-18.5C95.4,42.3,95.4,40.1,95.4,37.8z M95.4,16c0-1.2,0-2.2,0-3.3c0-2.8-1-3.9-3.8-3.9c-26.3,0-52.6,0-78.8,0
												c-0.4,0-0.8,0-1.1,0C10.3,9,9.1,9.9,9,11.3c-0.1,1.6,0,3.2,0,4.8C37.8,16,66.6,16,95.4,16z"/>
											<path class="btn_card" d="M59.3,48.6c0,1.2,0,2.3,0,3.5c-14.4,0-28.8,0-43.2,0c0-1.2,0-2.3,0-3.5C30.5,48.6,44.9,48.6,59.3,48.6z"/>
											<path class="btn_card" d="M73.9,48.6c4.8,0,9.5,0,14.3,0c0,3.6,0,7.1,0,10.7c-4.7,0-9.5,0-14.3,0C73.9,55.8,73.9,52.2,73.9,48.6z"/>
											<path class="btn_card" d="M16.2,59.3c0-1.2,0-2.3,0-3.5c7.2,0,14.3,0,21.5,0c0,1.1,0,2.3,0,3.5C30.6,59.3,23.4,59.3,16.2,59.3z"/>
										</g>
									</svg>
									<a href="boleto_bb.php?id=<?php echo$id_orcamento;?>" target="_blank">
										<svg class="svg_billet" style="width:105px;height:77px;">
											<style type="text/css">
												.btn_billet{fill:#000;}
											</style>
											<g class="g_btn_billet">
												<path class="btn_billet" d="M51.9,74.6c-14.2,0-28.3,0-42.5,0c-2.3,0-4.3-0.6-5.6-3c-0.4-0.8-0.7-1.8-0.7-2.7c0-19.8,0-39.6-0.1-59.5
													c0-2.7,2.3-5.4,4.5-5.8C8.3,3.5,9,3.5,9.7,3.5c28.2,0,56.3,0,84.5,0c2.3,0,4.5,0.3,5.7,3c0.4,0.8,0.8,1.8,0.8,2.7
													c0,19.9,0,39.8,0.1,59.7c0,2.5-2.2,5.5-4.6,5.7c-0.8,0.1-1.6,0.1-2.4,0.1C79.8,74.6,65.9,74.6,51.9,74.6z M51.9,71.1
													c14,0,28.1,0,42.1,0c2.6,0,2.9-0.4,2.9-3.3c0-19.2,0-38.4,0-57.6c0-2.6-0.4-3.1-2.6-3.1c-3,0-5.9,0-8.9,0C60.4,7,35.3,7,10.1,7
													c-3,0-3.3,0.3-3.3,3.7c0,18.5,0,37.1,0,55.6c0,4.7,0,4.7,3.9,4.7C24.5,71.1,38.2,71.1,51.9,71.1z"/>
												<path class="btn_billet" d="M44.4,10.6c2.6,0,5,0,7.6,0c0,18.9,0,37.8,0,56.8c-2.5,0-4.9,0-7.6,0C44.4,48.5,44.4,29.7,44.4,10.6z"/>
												<path class="btn_billet" d="M82,10.7c2.6,0,5,0,7.5,0c0,19,0,37.8,0,56.8c-2.5,0-4.9,0-7.5,0C82,48.5,82,29.7,82,10.7z"/>
												<path class="btn_billet" d="M29.4,67.5c-2.2,0-4.3,0-6.4,0c-1.2,0-0.9-1.1-0.9-1.9c0-8.2,0-16.4,0-24.6c0-9.5,0-18.9,0-28.4c0-1.6,0.3-2.3,1.8-2.2
													c1.8,0.1,3.6,0,5.6,0C29.4,29.6,29.4,48.4,29.4,67.5z"/>
												<path class="btn_billet" d="M78,67.4c-1.2,0-2.3,0-3.5,0c0-19,0-37.8,0-56.8c1.2,0,2.3,0,3.5,0C78,29.6,78,48.4,78,67.4z"/>
												<path class="btn_billet" d="M55.9,67.3c0-18.9,0-37.7,0-56.5c0.2-0.1,0.3-0.2,0.5-0.2c3.2-0.3,3.2-0.3,3.2,3.5c0,16.7,0,33.3,0,50
													C59.6,67.9,59.6,67.9,55.9,67.3z"/>
												<path class="btn_billet" d="M14.7,67.3c0-18.9,0-37.7,0-56.8c0.7,0,1.3,0.1,1.9,0c1.3-0.1,1.8,0.6,1.8,2.1c0,17.5,0,35.1,0,52.6
													C18.4,67.6,18,67.9,14.7,67.3z"/>
												<path class="btn_billet" d="M63.4,10.6c1.2,0,2.3,0,3.5,0c0,18.9,0,37.8,0,56.7c-1.1,0-2.2,0-3.5,0C63.4,48.5,63.4,29.7,63.4,10.6z"/>
												<path class="btn_billet" d="M40.5,67.4c-1.2,0-2.3,0-3.5,0c0-18.9,0-37.8,0-56.7c1.1,0,2.2,0,3.5,0C40.5,29.6,40.5,48.4,40.5,67.4z"/>
											</g>
										</svg>
									</a>
									<br><br>
									<center>
										<span style="font-size:25px;"><strong>Valor:</strong>&nbsp;<?php echo$prop["valor"];?></span>
									</center>	
								</div>
								<div class="card">
									<h3><?php echo $a108;?></h3>
									<form action="#" method="post">
										<label for="flag_card"><?php echo $a101;?></label>
										<select id="flag_card" name="flag_card">
											<option value="1">Visa</option>
											<option value="2">Martercard</option>
											<option value="3">America Express</option>
											<option value="4">Diners Clube</option>
										</select>
											<br><br>
										<label for="number_card"><?php echo $a102;?></label>
										<input type="text" id="number_card" name="number_card" class="input_larger"/>
											<br><br>
										<label for="name_card"><?php echo $a103;?></label>
										<input type="text" id="name_card" name="name_card" class="input_larger"/>
											<br><br>
										<label for="cpf_card"><?php echo $a104;?></label>
										<input type="text" id="cpf_card" name="cpf_card" class="input_larger"/>
											<br><br>
										<label for="cod_card"><?php echo $a105;?></label>
										<input type="text" id="cod_card" name="cod_card" class="input_smaller"/>
											<br><br>
										<label for="val_card"><?php echo $a106;?></label>
										<input type="text" id="val_card" name="val_card" class="input_smaller"/>
											<br><br>
										<label for="plots_card"><?php echo $a107;?></label>
										<select id="plots_card" name="plots_card">
											<?php 
											$id_v = 1;
											$result = $prop["valor"];
											for($v = 1;$v <= 12;$v ++){
												echo"<option value='$id_v'>$id_v X R$:&nbsp;".round($result, 2)."</option>";
												$id_v ++;
												$result = $result / $id_v;
											}?>
										</select>
											<br>
										<input type="submit" value="<?php echo $a108;?>"/>
									</form>
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