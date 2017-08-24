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
								<span><?php echo $a46;?></span>
								<?php include"alert_folder.php";?>
							</div>
							<div class="account">
								<h3><center><?php echo $a47;?></center></h3>
								<div class="access_configuration">
									<?php 
										session_start();
										$id = $_SESSION["id"];
										$exe = mysqli_query($con,"SELECT id_usuario,nome FROM cadastro WHERE id_usuario = '$id'");
											$name = mysqli_fetch_row($exe);
									?>
									<form action="edit_account.php" method="POST">
										<label for="name"><b><?php echo $a15.":";?></b><span class="fix_name">&nbsp;&nbsp;<?php echo $name[1];?></span></label>
											<div class="btn_modify btn_modify_name"><?php echo $a51;?></div>
											<input type="text" name="name" id="name" class="modify_name" value="<?php echo $name[1];?>"/>
											<input type="submit" value="<?php echo $a52;?>" class="modify_name"/>
									</form>
									<hr>
									<form action="edit_account.php" method="POST">
										<label for="password" class="fix_password"><b><?php echo $a8.":";?></b><span class="fix_password">&nbsp;&nbsp;<?php echo"********************";?></span></label>
											<div class="btn_modify btn_modify_password"><?php echo $a51;?></div>
										<label for="password" class="modify_password old_password"><b><?php echo $a48.":";?></b></label>	
											<input type="password" name="password_a" id="password" class="modify_password"/>
											<br><br>
										<label for="password" class="modify_password new_password"><b><?php echo $a49.":";?></b></label>	
											<input type="password" name="password_n" id="password" class="modify_password"/>
											<br><br>
										<label for="password" class="modify_password confima_password"><b><?php echo $a50.":";?></b></label>	
											<input type="password" name="password_c" id="password" class="modify_password"/>
											<br><br>
											<input type="submit" value="<?php echo $a52;?>" class="modify_password btn_modify_password"/>
											<br>
									</form>
									<hr>
								</div>
								<h3><center><?php echo $a53;?></center></h3>
								<div class="add_bank_account"><?php echo $a54;?></div>
								<div class="bank_account_setup">	
									<form action="edit_account.php" method="POST">
										<label for="title_account"><b><?php echo $a55.":*";?></b></label>	
											<input type="text" name="title_account" id="title_account" class="same"/>
											<br><br>
										<label for="cpf_cnpj"><b><?php echo $a56.":*";?></b></label>	
											<input type="text" name="cpf_cnpj" id="cpf_cnpj" class="same"/>
											<br><br>
										<label for="type_Bank"><b><?php echo $a57.":*";?></b></label>
											<select id="type_Bank" name="type_Bank">
												<option value=""><?php echo $a61;?></option>
												<?php 
													$exe_bank = mysqli_query($con,"SELECT * FROM banco");
														while($bank = mysqli_fetch_array($exe_bank)){?>
												<option value="<?php echo $bank['id_banco']?>"><?php echo $bank['banco']?></option>
														<?php
														}
														?>
											</select>
											<br><br>
										<label for="type_account"><b><?php echo $a58.":*";?></b></label>
											<select id="type_acount" name="type_acount">
												<option value=" "><?php echo $a62;?></option>
												<option value="1"><?php echo $a64;?></option>
												<option value="2"><?php echo $a65;?></option>
											</select>
											<br><br>	
										<label for="bank_branch"><b><?php echo $a59.":*";?></b></label>	
											<input type="text" name="bank_branch" id="bank_branch" class="bank_branch"/>
											<br><br>
										<label for="bank_account_number"><b><?php echo $a60.":*";?></b></label>	
											<input type="text" name="bank_account_number" id="bank_account_number" class="bank_account_number_dig" />
											<input type="text" name="bank_account_number_dig" id="bank_account_number" class="bank_account_number"/>
											<br><br>
											<input type="submit" value="<?php echo $a52;?>" class="modify_password btn_modify_password"/>
											<br>
									</form>
								</div>	
									<hr>
									<h4><center><?php echo $a63;?></center></h4>
										<br>
										<?php 
										$exe_dbank = mysqli_query($con,"SELECT a.id_conta_bancaria,a.titula_conta,a.cpf_cnpj, b.banco, a.tipo_conta, a.agencia, a.conta FROM conta_bancaria AS a 
										INNER JOIN banco AS b ON a.banco = b.id_banco WHERE id_usuario = '$id'");
											while($val_dbank = mysqli_fetch_array($exe_dbank)){?>
									<span style="margin-left:25px;font-size:17px;">
										<?php $cpf_cnpj = strlen($val_dbank["cpf_cnpj"]);?>
										<?php echo $val_dbank["titula_conta"];?>.&nbsp;<?php if($cpf_cnpj == 14){echo"CPF";}
										else if($cpf_cnpj == 18){echo"CNPJ";}?>&nbsp;<?php echo $val_dbank["cpf_cnpj"];?>
									</span>
										<br>
									<span style="margin-left:25px;font-size:17px;">
										<?php echo $val_dbank["banco"];?>.&nbsp;<?php echo $val_dbank["agencia"];?>.&nbsp;
										<?php if($val_dbank["tipo_conta"] == 1){
											echo"Conta corrente";
										}else if($val_dbank["tipo_conta"] == 2){
											echo"Conta poupança";
										}
										?>.&nbsp;<?php echo $val_dbank["conta"];?>
									</span>
									<a href="edit_account.php?id=<?php echo $val_dbank['id_conta_bancaria']?>" style="color:#000;">
										<span class="delete_bank_account"><?php echo $a41;?></span>
									</a>
									<hr style="margin-top:0px;">
										<?php 
											}
										?>	
							</div>	
						</div>	
					</div>			
				</div>
			</div>		
		</div>
		<?php include "header_footer.php";?> 
	</body>
</html>	