			<?php include"config.php";?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!--CSS-->
		<link rel="shortcut icon" href="imagens/favicon.png">
		<link rel="stylesheet" href="css/style_index.css">
		<!--Jquery-->
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/common.js"></script>
		<?php session_start();?>
		<script>
			$(function(){
				var pScreen = "<?php echo $_SESSION["screen"];?>"
					if(pScreen == 0){
						$(".Screen2").show();
					}else{
						$(".Screen3").hide();
						$(".Screen4").show();
						$(".menu").hide();
						$(".close").show();
						$(".nickname").hide();
					}		
			});
		</script>
		
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
						<span><?php echo $a3; ?></span>
					</div>
					<div class="menu">	
						<hr class="left"/>
						<hr class="right"/>
						<div class="submenu">
							<ul>
								<li><a href="contratante.php" target="_blank"><?php echo $a4; ?></a></li>
								<li><a href="freelancer.php" target="_blank"><?php echo $a5; ?></a></li>
								<li><a href="comofunciona.php" target="_blank"><?php echo $a6; ?></a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
			<div class="Screen Screen2">
				<div class="content">
					<hr class="left"/>
					<hr class="right"/>
					<div class="means">
						<h1><?php echo $a11; ?></h1>
						<fieldset>
							<form action="get.php" method="post">
								<label for="user_get"><?php echo $a7; ?></label>
									<input type="text" name="user" class="user_get" autofocus="autofocus" placeholder="<?php echo $a7; ?>"/>
										</br></br>
								<label for="user_get" ><?php echo $a8; ?></label>		
									<input type="password" name="password_get" class="user_get" placeholder="<?php echo $a8; ?>"/>
										</br></br>
									<input type="submit" value="<?php echo $a1; ?>" class="btn_get">
							</form>
							<span class="menu"><a href="#"><?php echo $a9; ?></a></span>
							<span class="menu"><a href="#"><?php echo $a10; ?></a></span>
						</fieldset>	
							<div class="login_facebook"><?php echo $a12; ?></div>
							<span class="phrases"><?php echo $a3; ?></span>
					</div>			
				</div>
			</div>
			<div class="Screen Screen3">
				<div class="content">
					<div class="means">
						<h1><?php echo $a13; ?></h1>
						<h3><?php echo $a14; ?></h3>
						<fieldset>
							<form action="user_register.php" method="post">
								<label for="user_register"><?php echo $a15; ?></label>
									<input type="text" name="name" class="user_register" autofocus="autofocus">
										</br></br>
								<label for="user_register" ><?php echo $a7; ?></label>		
									<input type="text" name="mail" class="user_register">
										</br></br>
								<label for="user_register" ><?php echo $a8; ?></label>		
									<input type="password" name="password_register" class="user_register">
										</br></br>
										<span></span>
									<input type="submit" value="Efetuar cadastro" class="btn_register">
										</br></br>
									<input type="hidden" name="proposals_email" value="0"/>
									<input type="checkbox" name="proposals_email" class="btn_che_register" value="1"/>
								<label for="btn_che_register"><?php echo $a17; ?></label>	
							</form>
						</fieldset>	
						<span class="phrases"><?php echo $a16; ?></span>
						<div class="three steps">3</div>
							<hr class="line">
						<div class="steps">2</div>
							<hr class="line">
						<div class="steps">1</div>	
					</div>			
				</div>
			</div>
			<div class="Screen Screen4">
				<div class="content">
					<hr class="left"/>
					<hr class="right"/>
					<div class="means">
						<h1><?php echo $a18; ?></h1>
						<script>	
							$(function(){
								$("input:file").change(function(){
									var file = $( this ).val().split("\\").pop();
									$.post('photo.php',{arq:file},
										function call_back(data){
											$(".photo").html(data);
										});
								});
							});		
						</script>
						<div class="photo"></div>
						<fieldset>
							<form action="photo.php" method="post" enctype="multipart/form-data">
									<input type="file" name="file" id="file" class="user_photo" accept="image/*"/>
										<label for="file" id="btn_file"><?php echo $a19; ?></label>
											</br></br>
									<input type="submit" value="<?php echo $a20; ?>" class="btn_next"/>
							</form>
						</fieldset>
					</div>			
				</div>
			</div>	
		</div>		
		<?php include "header_footer.php";?> 
	</body>
</html>	