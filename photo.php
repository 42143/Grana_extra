<?php
	include "config.php";
		if(!empty($_POST["arq"])){
			$file = $_POST["arq"];
			echo"<img style='width:201px;height:201px;border-radius:50%;'src='$file'/>";
		}else if(!empty($_POST["file"])){
			$arquivo = $_POST["file"];
			echo "<img src='$arquivo'>";
		}
			
		if(isset($_FILES["file"])){
			$arquivo = $_FILES["file"];
				$pasta_dir = "arquivos/";
				
				if(!file_exists($pasta_dir)){
					mkdir($pasta_dir);
				}
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
				
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
				
				$arquivo_nome = $pasta_dir . $nome_imagem;
				move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
				
				session_start();
				$id = $_SESSION["id"];
				$test = mysqli_query($con,"UPDATE cadastro SET foto = '$arquivo_nome' WHERE id_usuario = '$id'");
					if($test == 1){
						header("location:panel.php");
					}else{header("location:panel.php");}

		}
?>