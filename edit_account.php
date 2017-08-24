<?php
	include"config.php";
		session_start();
		$id = $_SESSION["id"];
			
		if(isset($_POST["name"])){
			if(empty($_POST["name"])){
				header("location:account.php");
			}else{
				$name = $_POST["name"];
				mysqli_query($con,"UPDATE cadastro SET nome = '$name' WHERE id_usuario = '$id'");
				header("location:account.php");
			}
		}else if(isset($_POST["password_a"])){
				$password_a = sha1($_POST["password_a"]);
				$exe = mysqli_query($con,"SELECT senha FROM cadastro WHERE id_usuario = '$id'");
					$password = mysqli_fetch_row($exe);
					if($password_a == $password[0]){
						$password_n = sha1($_POST["password_n"]);
						$password_c = sha1($_POST["password_c"]);
				
						if($password_n == $password_c){
							mysqli_query($con,"UPDATE cadastro SET senha = '$password_n' WHERE id_usuario = '$id'");
							header("location:account.php");
						}else{echo"<script>alert('Senha nova não confere');location.href='account.php';</script>";}	
					}else{echo"<script>alert('Senha antiga não confere');location.href='account.php';</script>";}
			
		}else if(isset($_POST["title_account"])){
			$title_account = $_POST["title_account"];
			$cpf_cnpj = $_POST["cpf_cnpj"];
			$type_Bank = $_POST["type_Bank"];
			$type_acount = $_POST["type_acount"];
			$bank_branch = $_POST["bank_branch"];
			$bank_account_number = $_POST["bank_account_number"];
			$bank_account_number_dig = $_POST["bank_account_number_dig"];
			
			$bank_account_number = $bank_account_number_dig."/".$bank_account_number;
			
			mysqli_query($con,"INSERT INTO conta_bancaria VALUES (NULL,'$title_account','$cpf_cnpj','$type_Bank','$type_acount','$bank_branch','$bank_account_number','$id')");
			header("location:account.php");
		
		}else{
			$id_mycartao = $_GET["id"];
			$delcartao = mysqli_query($con,"DELETE FROM conta_bancaria WHERE id_conta_bancaria = '$id_mycartao'");
				if($delcartao == 1){
					header("location:account.php");
				}
		}
		
?>