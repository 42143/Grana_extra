<?php
	include"config.php";
	session_start();
		$id = $_SESSION["id"];
	if(isset($_POST["value"])){
		$result = $_POST["value"];
		$result = ($result + ($result * 0.1));
		$deadline = $_POST["deadline"];
		$comment = $_POST["comment"];
		$id_project = $_POST["id_project"];
		
			date_default_timezone_set("America/sao_Paulo");
			$data = date("y-m-d H:1");
			
		$exe = mysqli_query($con,"INSERT INTO orcamento_alert VALUES (NULL,'$result','$deadline','$comment',NOW(),'$id_project','0','$id')");
			if($exe == 1){
				header("location:panel.php");
			}
	}else if(isset($_POST["accept"])){
		$accept = $_POST["accept"];
		$id_orcamento = $_POST["orcamento"];
				
				$exe = mysqli_query($con,"SELECT id_orcamento_alert,valor,prazo,comentarios,tempo,id_projeto,id_usuario FROM orcamento_alert WHERE id_orcamento_alert = '$id_orcamento'");
				$dados = mysqli_fetch_array($exe);
				$exe_rec = mysqli_query($con,"INSERT INTO orcamento VALUES (NULL,'$dados[id_orcamento_alert]','$dados[valor]','$dados[prazo]', '$dados[comentarios]','$dados[tempo]',
							'$dados[id_projeto]','$accept','$dados[id_usuario]')");
							
					if($exe == 1){
						$exe_del = mysqli_query($con,"DELETE FROM orcamento_alert WHERE id_orcamento_alert = '$id_orcamento'");
						header("location:payment_method.php?id=$dados[id_orcamento_alert]");}
	}else if(isset($_POST["pending"])){
		$pending = $_POST["pending"];
		$id_orcamento = $_POST["orcamento"];
				
				$exe = mysqli_query($con,"SELECT valor,prazo,comentarios,tempo,id_projeto,id_usuario FROM orcamento_alert WHERE id_orcamento_alert = '$id_orcamento'");
				$dados = mysqli_fetch_array($exe);
				$exe_rec = mysqli_query($con,"INSERT INTO orcamento VALUES (NULL,'$dados[id_orcamento_alert]','$dados[valor]','$dados[prazo]', '$dados[comentarios]','$dados[tempo]',
							'$dados[id_projeto]','$pending','$dados[id_usuario]')");
							
			if($exe == 1){
				$exe_del = mysqli_query($con,"DELETE FROM orcamento_alert WHERE id_orcamento_alert = '$id_orcamento'");
				header("location:panel.php");}
	}else if(isset($_POST["refuse"])){
		$refuse = $_POST["refuse"];
		$id_orcamento = $_POST["orcamento"];
			
		$exe = mysqli_query($con,"SELECT valor,prazo,comentarios,tempo,id_projeto,id_usuario FROM orcamento_alert WHERE id_orcamento_alert = '$id_orcamento'");
				$dados = mysqli_fetch_array($exe);
				$exe_rec = mysqli_query($con,"INSERT INTO orcamento VALUES (NULL,'$dados[id_orcamento_alert]','$dados[valor]','$dados[prazo]', '$dados[comentarios]','$dados[tempo]',
							'$dados[id_projeto]','$refuse','$dados[id_usuario]')");	
							
			if($exe_rec == 1){
				$exe_del = mysqli_query($con,"DELETE FROM orcamento_alert WHERE id_orcamento_alert = '$id_orcamento'");
				header("location:panel.php");}
	}else{
		
		$result = $_POST["result"];
		$result = ($result + ($result * 0.1));
		echo $result ;
	}	
?>