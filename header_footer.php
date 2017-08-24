<?php 
	include"config.php";
		error_reporting(0);
		session_start();			
			if(!isset($_SESSION["id"])){
				session_destroy();
			}else{
				$id = $_SESSION["id"];
				$cadastro = mysqli_query($con,"SELECT id_usuario,nome FROM cadastro WHERE id_usuario = '$id'");
				$dados = mysqli_fetch_row($cadastro);
			}
?>
<header>
	<div class="content">
		<div class="logo"></div>
			<nav>
				<div class="menu get"><?php echo $a1; ?></div>
				<div class="menu register"><?php echo $a2; ?></div>
				<a href="get.php">
					<div class="menu close"><?php echo $a0; ?></div>
				</a>
				<a href="create_project.php">	
					<div class="menu create_project"><?php echo $av; ?></div>
				</a>	
			</nav>
			<div class="nickname"><?php echo $dados["1"];?></div>
	</div>	
</header>	
<footer>
			<div class="content">
				<div class="map_site">
					<img src="imagens/logotipo.png" alt="">	
				</div>
				<div class="menu_language">
					<ul>
						<li>Grana extra &copy; 2016</li>
						<li>|</li>
						<li><a href="?language=1" onclick="window.location.reload();">Português (Brasil)</a></li>
						<li>|</li>	
						<li><a href="?language=2" onclick="window.location.reload();">English (US)</a></li>
					</ul>
				</div>	
			</div>	
		</footer>