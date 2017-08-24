<?php
	include"config.php";
	
	if(isset($_GET["idp"])){
		$id_projeto = $_GET["idp"];
		$exe = mysqli_query($con,"UPDATE download SET flag_concluir = '3' WHERE id_projeto = '$id_projeto'");
			if($exe == 1){
				echo"<script>history.back();</script>";
			}
	}else if(isset($_POST["dois"])){
		$id_projeto = $_POST["idp"];
		$exe = mysqli_query($con,"UPDATE download SET flag_concluir = '2' WHERE id_projeto = '$id_projeto'");
			if($exe == 1){
				$exe = mysqli_query($con,"UPDATE download SET flag_reputacao = '1' WHERE id_projeto = '$id_projeto'");
				echo"<script>history.back();</script>";
			}
	}else if(isset($_POST["um"])){
		$id_projeto = $_POST["idp"];
		$exe = mysqli_query($con,"UPDATE download SET flag_concluir = '1' WHERE id_projeto = '$id_projeto'");
			if($exe == 1){
				$exe = mysqli_query($con,"UPDATE download SET flag_reputacao = '1' WHERE id_projeto = '$id_projeto'");
				echo"<script>history.back();</script>";
			}
	}else if(isset($_POST["bom"])){
		$usuario_reputacao = $_POST["usuario_reputacao"];
		$id_projeto = $_POST["idp"];
			$exe = mysqli_query($con,"INSERT INTO reputacao VALUES (NULL,'1','0','0','$usuario_reputacao')");
			if($exe == 1){
				$arq = mysqli_query($con,"SELECT arquivo FROM download WHERE id_projeto = '$id_projeto'");
					$d_arq = mysqli_fetch_array($arq);
					$exe_arq = mysqli_num_rows($arq);
					if($exe_arq == 1){
						unlink($d_arq["arquivo"]);
						mysqli_query($con,"DELETE FROM download WHERE id_projeto = '$id_projeto'");
						echo"<script>history.back();</script>";	
					}
			}
	}else if(isset($_POST["regular"])){
		$usuario_reputacao = $_POST["usuario_reputacao"];
		$id_projeto = $_POST["idp"];
			$exe = mysqli_query($con,"INSERT INTO reputacao VALUES (NULL,'0','1','0','$usuario_reputacao')");
			if($exe == 1){
				$arq = mysqli_query($con,"SELECT arquivo FROM download WHERE id_projeto = '$id_projeto'");
					$d_arq = mysqli_fetch_array($arq);
					$exe_arq = mysqli_num_rows($arq);
					if($exe_arq == 1){
						unlink($d_arq["arquivo"]);
						mysqli_query($con,"DELETE FROM download WHERE id_projeto = '$id_projeto'");
						echo"<script>history.back();</script>";	
					}
			}
	}else if(isset($_POST["ruim"])){
		$usuario_reputacao = $_POST["usuario_reputacao"];
		$id_projeto = $_POST["idp"];
			$exe = mysqli_query($con,"INSERT INTO reputacao VALUES (NULL,'0','0','1','$usuario_reputacao')");
			if($exe == 1){
				$arq = mysqli_query($con,"SELECT arquivo FROM download WHERE id_projeto = '$id_projeto'");
					$d_arq = mysqli_fetch_array($arq);
					$exe_arq = mysqli_num_rows($arq);
					if($exe_arq == 1){
						unlink($d_arq["arquivo"]);
						mysqli_query($con,"DELETE FROM download WHERE id_projeto = '$id_projeto'");
						echo"<script>history.back();</script>";	
					}
			}
	}

?>