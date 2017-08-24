<?php
	include"config.php";
	
	
	if(isset($_POST["id_projeto"])){
		$id_projeto = $_POST["id_projeto"];
		$name_project = $_POST["name_project"];
		$area_summary = $_POST["area_summary"];
		$reference = $_POST["reference"];
		$area = $_POST["area"];
		
			$exe = mysqli_query($con,"UPDATE cria_projeto SET nome_projeto = '$name_project',resumo_projeto = '$area_summary',referencia = '$reference',descreva = '$area' 
			WHERE id_projeto = '$id_projeto'");
				if($exe == 1){
					echo "<script>location.href='edit_project.php?idpjt=$id_projeto';</script>";
				}			
	}else if(isset($_GET["idref"])){
		$idref = $_GET["idref"];
		$exe = mysqli_query($con,"DELETE FROM orcamento WHERE id_orcamento = '$idref'");
				if($exe == 1){
					echo "<script>location.href='my_projects.php';</script>";
				}	
	}else if(isset($_GET["idproref"])){
		$idproref = $_GET["idproref"];
		$exe = mysqli_query($con,"DELETE FROM orcamento WHERE id_orcamento = '$idproref'");
				if($exe == 1){
					echo "<script>location.href='my_proposals.php';</script>";
				}	
	}else if(isset($_GET["idacc"])){
		$idacc = $_GET["idacc"];
		$exe = mysqli_query($con,"UPDATE orcamento SET flag_proposta = '1' WHERE id_orcamento = '$idacc'");
				if($exe == 1){
					echo "<script>location.href='my_projects.php';</script>";
				}	
	}else{
			$up_proj = $_GET["idpjt"]; 
		$exe = mysqli_query($con,"DELETE FROM cria_projeto WHERE id_projeto = '$up_proj'");
				if($exe == 1){
					echo "<script>location.href='my_projects.php';</script>";
				}			
	}
?>