<?php
	include"config.php";
		if(isset($_FILES["add_imagens"])){
			
			$name_project = $_POST["name_project"];
			$services = $_POST["services"];
			$area_summary = $_POST["area_summary"];
			$reference = $_POST["reference"];
			$desc_project = $_POST["desc_project"];
			$freelar_escolhar = $_POST["freelar_escolhar"];
				
				date_default_timezone_set("America/sao_Paulo");
				$data = date("y-m-d H:1");
				
						$arquivo = $_FILES["add_imagens"];
					$pasta_dir = "projetos/";
					
					if(!file_exists($pasta_dir)){
						mkdir($pasta_dir);
					}
					preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
					
					$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
					
					$arquivo_nome = $pasta_dir . $nome_imagem;
					move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
					
					session_start();
					$id = $_SESSION["id"];	
				$exe = mysqli_query($con,"INSERT INTO cria_projeto VALUES(NULL,'$name_project','$services','$area_summary','$reference','$arquivo_nome','$desc_project','$freelar_escolhar',NOW(),'$id')");
						if($exe == 1){
							header("location:panel.php");
						}else{
							echo"<script>alert('ERRO');history.back();</script>";
						}
		}
			
?>