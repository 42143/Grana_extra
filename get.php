<?php 
		include"config.php";
		session_start();
	if(isset($_POST["user"])){
		$usuario = $_POST["user"];
		$senha = sha1($_POST["password_get"]);
											
			$exe = mysqli_query($con,"SELECT id_usuario,email,senha FROM cadastro WHERE email = '$usuario' and senha = '$senha' ");
				$dados = mysqli_fetch_row($exe);
			$screen2 = mysqli_num_rows($exe);
											
		if($screen2 == 1){
				$_SESSION["id"] = $dados["0"];
			header("location:panel.php");
		}else{
			$_SESSION["screen"] = $screen2;
			header("location:index.php");
		}	
	}else{
		$id = $_SESSION["id"];
		$approval = mysqli_query($con,"SELECT a.id_projeto FROM download AS a INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto WHERE b.id_usuario = '$id'");
			$d_approval = mysqli_fetch_array($approval);
				$exe = mysqli_query($con,"UPDATE download SET flag_concluir = '0' WHERE id_projeto = '$d_approval[id_projeto]'");
					if($exe == 1){
						session_destroy();
						//echo"<script>window.localStorage.removeItem('idChat');</script>";
						header("location: index.php");exit;
					}
	}
?>
