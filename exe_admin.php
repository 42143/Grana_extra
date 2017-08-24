<?php
	include"config.php";
		if(!empty($_POST["ability"])){
			$add_habilidade = $_POST["ability"];
			$exe = mysqli_query($con,"INSERT INTO habilidade VALUES(NULL,'$add_habilidade')");
		}else if(!empty($_POST["delet_ability"])){
			$exc_habilidade = $_POST["delet_ability"];
			$exe = mysqli_query($con,"DELETE FROM habilidade WHERE id_habilidade = '$exc_habilidade'");
		}else if(!empty($_POST["bank"])){
			$add_bank = $_POST["bank"];
			$exe = mysqli_query($con,"INSERT INTO banco VALUES(NULL,'$add_bank')");
		}else if(!empty($_POST["delet_bank"])){
			$exc_bank = $_POST["delet_bank"];
			$exe = mysqli_query($con,"DELETE FROM banco WHERE id_banco = '$exc_bank'");
		}else if(!empty($_POST["services"])){
			$add_services = $_POST["services"];
			$exe = mysqli_query($con,"INSERT INTO servico VALUES(NULL,'$add_services')");
		}else if(!empty($_POST["delet_services"])){
			$exc_services = $_POST["delet_services"];
			$exe = mysqli_query($con,"DELETE FROM servico WHERE id_servico = '$exc_services'");
		}else if(!empty($_POST["admin"])){
				if(!empty($_POST["senha_admin"])){
					if(strlen($_POST["senha_admin"]) > 7){
						if(!empty($_POST["type_admin"])){
							$add_admin = $_POST["admin"];
							$pw_admin = sha1($_POST["senha_admin"]);
							$type_admin = $_POST["type_admin"];
							
							$exe = mysqli_query($con,"INSERT INTO admin VALUES(NULL,'$add_admin','$pw_admin','$type_admin')");
						}else{echo"<script>alert('Erro no tipo');location.href='admin.php';</script>";}
					}else{echo"<script>alert('Senha fraca,tem que conter ate 8 caracteres');location.href='admin.php';</script>";}	
				}else{echo"<script>alert('Vereficar a senha');location.href='admin.php';</script>";}
		}else if(!empty($_POST["delet_admin"])){
			$exc_admin = $_POST["delet_admin"];
			$exe = mysqli_query($con,"DELETE FROM admin WHERE id_servico = '$exc_admin'");
		}else if(!empty($_POST["valor_plano_classic"])){
			$value_classic = $_POST["valor_plano_classic"];
			$exe = mysqli_query($con,"UPDATE valor_upgrade SET valor='$value_classic' WHERE id_upgrade = '1'");
		}else if(!empty($_POST["valor_plano_premuim"])){
			$value_premium = $_POST["valor_plano_premuim"];
			$exe = mysqli_query($con,"UPDATE valor_upgrade SET valor='$value_premium' WHERE id_upgrade = '2'");
		}else if($_POST["flag_status"] == "1"){
			$id_boleto = $_POST["idboleto"];
			$exe = mysqli_query($con,"UPDATE boleto SET flag_status='1' WHERE id_boleto = '$id_boleto'");
		}else if($_POST["flag_status"] == "2"){
			$id_boleto = $_POST["idboleto"];
			$exe = mysqli_query($con,"UPDATE boleto SET flag_status='2' WHERE id_boleto = '$id_boleto'");
		}else if (!empty($_POST['usuario'])){
			$usuario = $_POST['usuario'];
			$senha = sha1($_POST['senha']);
			$query = "SELECT * FROM admin WHERE usuario = '$usuario' and senha = '$senha'";
			$executar = mysqli_query($con,$query);
			$row = mysqli_num_rows($executar);
			$dados = mysqli_fetch_array($executar);

			if($row == 1){
				session_start();
				$_SESSION['admin'] = $dados['id_admin'];
				$_SESSION['typeadmin'] = $dados['flag_admin'];
				echo"<script>location.href='admin.php';</script>;";
				
			}else{
				
				echo"<script>alert('Usuario ou senha incorretos');location.href='login_admin.php';</script>;";
			}
		}else{echo"<script>alert('campo vazio');location.href='admin.php';</script>;";}


	
	
	
		
		
		if($exe == 1){
			header("location:admin.php");
		} 
	
	
	


 
	
?>







