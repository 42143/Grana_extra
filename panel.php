<?php include"config.php";
		error_reporting(0);
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
						<div class="panel search_project">
							<div class="header_search_project"><?php echo $a21; ?></div>
							<div class="lists_search_project">
								<?php 
									$d_services = mysqli_query($con,"SELECT * FROM servico");
										$i = 1;
									while($services = mysqli_fetch_array($d_services)){ $i ++?>
										<div class='btn_lists_search_project'>
											<input type="checkbox" name="mylist[]" id="myList<?php echo $i;?>" value="<?php echo $services['id_servico']?>">&nbsp;<?php echo $services["servicos"]?>
										</div>
								<?php	
									}
									?>		
							</div>
							<div class="btn_submit_lists_search_project"><?php echo $a22; ?></div>
							<script>
									$(function(){
										$(".btn_submit_lists_search_project").click(function(){
												camposMarcados = new Array();
											$("input[type=checkbox][name='mylist[]']:checked").each(function(){
												camposMarcados.push($(this).val());
											});
											//alert(camposMarcados);
											$.post("list_services.php",{idServ:camposMarcados},
												function call_back(data){
													$(".lists_recent_projects").html(data);
												}
											)
										});
										
									});
							</script>
						</div>							
						<!--panel_profile-->
						<?php include"panel_profile.php";?>
						<div class="panel recent_projects">
							<div class="header_lists_recent_projects">Projetos recentes
								<?php include"alert_folder.php";?>
							</div>
							<div class="lists_recent_projects">
								<!--lista de projetos do contratante-->
								<?php
									$project = mysqli_query($con,"SELECT a.id_projeto,a.nome_projeto,a.resumo_projeto,a.tipo_freelancer,DATE_FORMAT(a.tempo,'%d/%m/%y')AS tempo,b.nome,b.foto 
									FROM cria_projeto AS a INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario ORDER BY tempo DESC");
									while($data_project = mysqli_fetch_array($project)){?>
								<div class='lists_contractor'>
									<div class='perfil_contractor'>
										<div class='photo_contractor'>
											<img class='photo_contractor' src="<?php echo$data_project['foto'];?>"/>
										</div>
										<span style='margin-left:55px;'><?php echo $data_project["nome"];?></span>
										<span style='margin-left:230px;'><?php if($data_project["tipo_freelancer"] == 2){echo"<strong style='color:#FF6600;'>Freela Classic</strong>";}
										else if($data_project["tipo_freelancer"] == 3){echo"<strong style='color:#199ED8;'>Freela Premiun</strong>";}?></span>
										<span style='margin-left:330px;'><?php echo $data_project["tempo"];?></span>
									</div>
									<div class='title_contractor' style='font-size:18px;font-weight:bold;margin-left:20px;'>	
										<span><?php echo $data_project["nome_projeto"];?></span>
									</div>	
									<span><?php echo utf8_encode($data_project["resumo_projeto"]);?></span>
									<a href='preview_project.php?id_projeto=<?php echo $data_project["id_projeto"];?>'>
										<div class='menu btn_contractor'>Veja o projeto</div>
									</a>	
								</div>
									<hr>
									<?php
									}
									?>
								<!--fim da lista de projetos do contratante-->
							</div>
						</div>
						<?php
							$id = $_SESSION["id"];
							$approval = mysqli_query($con,"SELECT a.id_projeto,a.id_usuario,a.flag_concluir,a.data_down,a.vencimento_down,a.flag_reputacao,b.nome_projeto,c.nome FROM download AS a INNER JOIN 
							cria_projeto AS b ON a.id_projeto = b.id_projeto INNER JOIN cadastro AS c ON a.id_usuario = c.id_usuario WHERE b.id_usuario = '$id'");
							$d_approval = mysqli_fetch_array($approval);
							$v_approval = mysqli_num_rows($approval);
							
								$data_down = $d_approval["data_down"];
									$data = explode("-",$data_down);
								$vencimento_down = $d_approval["vencimento_down"];
									$vencimento = explode("-",$vencimento_down);
										$dias_restantes = ($data[2] - $vencimento[2]);
										
								$id_approval = $d_approval["id_projeto"];
								$id_usuario_reputacao  = $d_approval["id_usuario"];
									
										date_default_timezone_set("America/sao_Paulo");
										$data_up = date("Y-m-d");
										mysqli_query($con,"UPDATE download SET data_down='$data_up' WHERE id_projeto = '$id_approval'");
									
								if($d_approval["flag_concluir"] == "0"){
									echo"
										<script>
											$(function(){
												$('.contractor_approval').show();
												$('.mask_black').show();
											});
										</script>
									";
								}else if($d_approval["flag_reputacao"] == "1"){
									echo"
										<script>
											$(function(){
												$('.cashier_approval').hide();
												$('.contractor_approval').show();
												$('.approval_freelar').show();
												$('.mask_black').show();
											});
										</script>
									";
								}
						?>
					</div>			
				</div>
			</div>	
			<div class="Screen Screen2">
				<div class="content">
					<div class="mask_black"></div>
						<div class="means">
							<div class="contractor_approval">
								<div class="cashier_approval">
									<center>
										<span>Notificamos a conclusão do Projeto<strong> <?php echo $d_approval["nome_projeto"]; ?> </strong>Desenvolvido pelo <strong> <?php echo $d_approval["nome"]; ?> </strong> </span>
											<br><br>
										<span>O serviço está aprovado?</span>
											<br>
										<form action="approval.php" method="post">
											<input type="hidden" name="idp" value="<?php echo $id_approval;?>"/>
											<input type="hidden" name="um" value="1"/>
											<input type="submit" class="btn btn_approval" value="Aprovado"/>
										</form>
										<form action="approval.php" method="post">
											<input type="hidden" name="idp" value="<?php echo $id_approval;?>"/>
											<input type="hidden" name="dois" value="2"/>
											<input type="submit" class="btn btn_reproof" value="Reprovado"/>
										</form>
										<span>
											<b><a href="approval.php?idp=<?php echo $id_approval;?>" style="color:#000;">Avaliar mais tarde</a></b>
											<?php echo$dias_restantes;?> dias restantes
										</span>
									</center>
								</div>
								<div class="approval_freelar">
									<center>
										<h3>Como você avalia o Freelancer?</h3>
									</center>	
										<br>
									<form action="approval.php" method="post">
										<input type="hidden" name="idp" value="<?php echo $id_approval;?>"/>
										<input type="hidden" name="usuario_reputacao" value="<?php echo$id_usuario_reputacao;?>"/>
										<input type="hidden" name="bom" value="1"/>
										<input type="submit" class="btn btn_good" value="Bom"/>
									</form>
									<form action="approval.php" method="post">
										<input type="hidden" name="idp" value="<?php echo $id_approval;?>"/>
										<input type="hidden" name="usuario_reputacao" value="<?php echo$id_usuario_reputacao;?>"/>
										<input type="hidden" name="regular" value="2"/>
										<input type="submit" class="btn btn_regular" value="Regular"/>
									</form>
									<form action="approval.php" method="post">
										<input type="hidden" name="idp" value="<?php echo $id_approval;?>"/>
										<input type="hidden" name="usuario_reputacao" value="<?php echo$id_usuario_reputacao;?>"/>
										<input type="hidden" name="ruim" value="3"/>
										<input type="submit" class="btn btn_bad" value="Ruim"/>
									</form>
										<br>
									<center>	
										<hr style="border:solid 1px #ccc;width:450px;border-radius: 200px /8px;">
										<span style="font-size:15px;">Essas informções ficaram disponivel na linha de reputação do Freelancer</span>
									</center>	
								</div>	
							</div>
							<div class="cashier_balance">
								<?php 
									if(isset($_GET["ids"])){
										$flag = $_GET["ids"];
										$redeem = mysqli_query($con,"UPDATE saldo_ge SET flag_liberacao='$flag' WHERE id_usuario = '$id'");
									}
									$d_balance = mysqli_query($con,"SELECT * FROM saldo_ge WHERE id_usuario = '$id'");
										$balance = mysqli_fetch_array($d_balance);
								?>
								<center>
									<span><strong>Seu Saldo Atual é de R$:<?php echo$balance["saldo"];?></strong></span>
										<br>
									<span>Desejo resgatar o dinheiro</span>
									<a href="?ids=1">
										<div class="btn btn_rescue" >Resgatar Dinheiro</div>
									</a>
									<div class="btn btn_cancel">Cancela</div>
									<span style="font-size:15px;">O dinheiro será depositado  3 dias uteis apos oa confirmação do resgate</span>
								</center>
								<script>
									$(function(){
										$(".btn_cancel").click(function(){
											$(".cashier_balance").hide();
											$('.mask_black').hide();	
										});
												
									});
								</script>	
							</div>
						</div>		
				</div>
			</div>	
		</div>
		<?php include "header_footer.php";?> 
	</body>
</html>	