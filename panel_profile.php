<?php
	include"config.php";		
			if(!isset($_SESSION["id"])){
				header("location:index.php");
			}else{
					$id = $_SESSION["id"];
					$exe_photo = mysqli_query($con,"SELECT id_usuario,foto,tipo_freelancer FROM cadastro WHERE id_usuario = '$id'");
					$photo = mysqli_fetch_row($exe_photo);
			}
?>
<div class="panel profile">
						<form action="photo.php" method="post" id="submitform" enctype="multipart/form-data">
							<input type="file" name="file" id="file" class="user_photo" accept="image/*"/>
								<label for="file">
									<div class="photo"><img src="<?php echo $photo["1"]?>"></div>
								</label>	
						</form>	
								<script type="text/javascript">	
									$(function(){
										$("#file").change(function(){
											var file = $(this).val().split("\\").pop();
											$.post('photo.php',{file:file},
												function call_back(data){
													$(".photo").html(data);
													$("#submitform").submit();
												});
										});
									});		
								</script>
							<div class="menu btn_edit_profile"><?php echo $a23;?></div>
							<a href="account.php">
								<div class="menu btn_account"><?php echo $a24; ?></div>
							</a>
							<span style=""><?php if($photo["2"] == 2){echo"<strong style='color:#FF6600;'>Freela Classic</strong>";}
							else if($photo["2"] == 3){echo"<strong style='color:#199ED8;'>Freela Premiun</strong>";}?></span>
								<hr>
					<div class="profile_main">		
							<span  class="subtheme"><?php echo $a25."(?)"; ?> </span>
							<div class="reputation">
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
										<?php include"wire_reputation.php"?>
									</g>
								</svg>
									<?php 
										$d_bom = mysqli_query($con,"SELECT bom FROM reputacao WHERE id_usuario = '$id'");
										$value_bom = mysqli_num_rows($d_bom);
									?>			
									<span style="font-size:30px;float:right;margin-right:50px;margin-top:-25px;"><?php if($value_bom < 10){echo"0".$value_bom;}else{echo$value_bom;}?></span>
										<br>
									<span style="font-size:15px;float:right;margin-top:-40px;margin-right:10px;"><?php echo $a25;?></span>
							</div>
								<hr>
								<?php 
									$id = $_SESSION["id"];
									$value_m = mysqli_query($con,"SELECT saldo FROM saldo_ge WHERE id_usuario = '$id'");
										$money = mysqli_fetch_array($value_m);
								?>
							<span class="subtheme"><?php echo $a27."(?)"; ?></span>
							<span style="float:right;"><?php echo $a28; ?>
								<span class="btn_saldo" style="margin-left:10px;font-size:30px;margin-right:15px;">R$&nbsp;<?php if(!isset($money["saldo"])){echo"00,00";}else{echo$money["saldo"];}?></span>
							</span>
							<script>
								$(function(){
									$(".btn_saldo").click(function(){
										$(".cashier_balance").show();
										$('.mask_black').show();
									});
								});
							</script>
								<hr>
							<span class="subtheme"><?php echo $a29."(?)"; ?></span>
							<a href="my_projects.php">
								<div class="menu btn_my_projects"><?php echo $a30; ?></div>
							</a>	
								<hr class="none">
								<ul>
									<?php 
										$accept = mysqli_query($con,"SELECT a.flag_proposta FROM orcamento AS a INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.flag_proposta = '1' AND c.id_usuario = '$id'");
										$pending = mysqli_query($con,"SELECT a.flag_proposta FROM orcamento AS a INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.flag_proposta = '2' AND c.id_usuario = '$id'");
										$refused = mysqli_query($con,"SELECT a.flag_proposta FROM orcamento AS a INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE a.flag_proposta = '3' AND c.id_usuario = '$id'");
										$accept_value = mysqli_num_rows($accept);
										$pending_value = mysqli_num_rows($pending);
										$refused_value = mysqli_num_rows($refused);
									?>
									<li><span class="projects_submitted_value"><?php if($accept_value < 10){echo"0".$accept_value;}else{echo$accept_value;}?></span><br><?php echo $a33; ?></li>
									<li><span class="projects_submitted_value space"><?php if($pending_value < 10){echo"0".$pending_value;}else{echo$pending_value;}?></span><br><?php echo $a34; ?></li>
									<li><span class="projects_submitted_value space"><?php if($refused_value < 10){echo"0".$refused_value;}else{echo$refused_value;}?></span><br><?php echo $a35; ?></li>
								</ul>	
								<hr>	
							<span class="subtheme"><?php echo $a31."(?)"; ?></span>
							<a href="my_proposals.php">
								<div class="menu btn_my_proposals"><?php echo $a32; ?></div>
							</a>	
								<hr class="none">
								<ul>
									<?php
										$mypro_accept = mysqli_query($con,"SELECT a.id_orcamento FROM orcamento AS a INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE a.id_usuario = '$id' AND a.flag_proposta = '1'");
										$mypro_pending = mysqli_query($con,"SELECT a.id_orcamento FROM orcamento AS a INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE a.id_usuario = '$id' AND a.flag_proposta = '2'");
										$mypro_refused = mysqli_query($con,"SELECT a.id_orcamento FROM orcamento AS a INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE a.id_usuario = '$id' AND a.flag_proposta = '3'");
										$mypro_accept_value = mysqli_num_rows($mypro_accept);
										$mypro_pending_value = mysqli_num_rows($mypro_pending);
										$mypro_refused_value = mysqli_num_rows($mypro_refused);
									?>
									<li><span class="projects_submitted_value"><?php if($mypro_accept_value < 10){echo"0".$mypro_accept_value;}else{echo$mypro_accept_value;}?></span><br><?php echo $a33; ?></li>
									<li><span class="projects_submitted_value space"><?php if($mypro_pending_value < 10){echo"0".$mypro_pending_value;}else{echo$mypro_pending_value;}?></span><br><?php echo $a34; ?></li>
									<li><span class="projects_submitted_value space"><?php if($mypro_refused_value < 10){echo"0".$mypro_refused_value;}else{echo$mypro_refused_value;}?></span><br><?php echo $a35; ?></li>
								</ul>	
					</div>
					<div class="edit_profile">
							
								<label for="idAbility" class="label_edit_profile"><?php echo $a39; ?></label>
									<br>
									<select id="idAbility" class="ability" onchange="myAbility()">
									<option value=""><?php echo $a40; ?></option>
										<?php 
											$exe_ability = mysqli_query($con,"SELECT * FROM habilidade");
												while($ability = mysqli_fetch_array($exe_ability)){?>
										<option value="<?php echo $ability['id_habilidade']?>"><?php echo $ability['habilidade']?></option>
												<?php
												}
												?>
									</select>
									<script type="text/javascript">
										function myAbility(){
											var myAbility = document.getElementById("idAbility").value;
											$(function(){
												$.post("my_ability.php",{ability:myAbility},
												function call_back(data){
													$(".data_ability").html(data);	
												})
											});
										}
									</script>
								<div class="data_ability">
									<?php	
											error_reporting(0);
											$jh = mysqli_query($con,"SELECT id_editar_perfil, habilidade FROM editar_perfil WHERE id_usuario = '$id'");
											$file = mysqli_fetch_row($jh);
		
											$fg = file($file[1]);
											$gf = implode($fg);
											$fgs = str_split($gf);
											foreach($fgs as $value){
												$bus_ablility = mysqli_query($con,"SELECT * FROM habilidade WHERE id_habilidade = '$value'");
												$mos_ability = mysqli_fetch_array($bus_ablility);
												echo "<div style='heigth:17px;border:solid 2px #fff;'>".$mos_ability['habilidade'].
													"<button value='$value' id='myBtn' onclick='myFunction()' 
														style='float:right;background:#F7F8F9;border:none;color:red;cursor:pointer;'>".$a41."</button>
													</a>
													</div>";
											}	
									?>		
								</div>
								<script type="text/javascript">
									function myFunction(){
										var abilityDel = document.getElementById("myBtn").value;
											$(function(){
												$.post("my_ability.php",{abilitydel:abilityDel},
												function call_back(data){
													$(".data_ability").html(data);	
												})
											});									
									}
								</script>
									<hr>
									<?php 
										$value = mysqli_query($con,"SELECT id_editar_perfil, conte_sobre, conte_experiencia FROM editar_perfil WHERE id_usuario = '$id' ");
										$text = mysqli_fetch_array($value);
									?>
							<form action="my_ability.php" method="post">		
								<label for="professional_experience" class="label_edit_profile"><?php echo $a42; ?></label>
									<textarea rows="5" cols="46" name="csv" class="professional_experience"><?php echo $text['conte_sobre'];?></textarea>
									<hr>
								<label for="professional_experience" class="label_edit_profile"><?php echo $a43; ?></label>
									<textarea rows="5" cols="46"  name="exp" class="professional_experience"><?php echo $text['conte_experiencia'];?></textarea>
								<input type="submit" name="sage" value="<?php echo $a44; ?>" class="sage_profile"/>
							</form>
									<hr>
							<a href="edit_portfolio.php">	
								<div class="edit_portfolio"><?php echo $a45; ?></div>
							</a>	
					</div>
						</div>