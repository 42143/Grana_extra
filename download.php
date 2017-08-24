<?php
	include"config.php";
	$id_downAlert = $_GET["id"];
	
	$downAlert = mysqli_query($con,"SELECT * FROM download_alert WHERE id_download_alert = '$id_downAlert'");
		$dataDown = mysqli_fetch_array($downAlert);
		$result = mysqli_num_rows($downAlert);
		if($result == 1){
			date_default_timezone_set("America/sao_Paulo");
				$data_down = date("Y-m-d");
				$dias_de_prazo_down = 15;
				$vencimento_down = date("Y-m-d", time() + ($dias_de_prazo_down * 86400));
			$exe = mysqli_query($con,"INSERT INTO download VALUES (NULL,'$dataDown[id_projeto]','$dataDown[id_usuario]','$dataDown[arquivo]','0','$data_down','$vencimento_down','0')");
			if($exe == 1){
				$deletDown = mysqli_query($con,"DELETE FROM download_alert WHERE id_download_alert = '$id_downAlert'"); 
				echo"<script>history.back();</script>";
			}else{echo"<script>history.back();alert('Erro');</script>";}
		}else{echo"<script>history.back();alert('Erro');</script>";}
?>