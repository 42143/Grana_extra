<?php 
	include"config.php";
			$nome = $_POST["name"];
			$email = $_POST["mail"];
			$senha = $_POST["password_register"];
			$proposta = $_POST["proposals_email"];
			
			$exe = mysqli_query($con,"SELECT email FROM cadastro WHERE email = '$email'");
			$test = mysqli_num_rows($exe);
												
			if($test == 1){
				echo"<script>alert('Conta existente');location.href='index.php';</script>";
			}else{							
				$campo = empty($nome) || empty($email) ||empty($senha);
				if(!$campo){	
					if(strlen($nome) < 3 || strlen($nome) > 40 ){
						echo"<script>alert('verifique o seu nome');location.href='index.php';</script>";
					}else if(strlen($email) < 5 || strlen($email) > 100 ){
						echo"<script>alert('verifique o seu Email');location.href='index.php';</script>";
					}else if(strlen($senha) < 7 || strlen($senha) > 40 ){
						echo"<script>alert('verifique a senha');location.href='index.php';</script>";
					}else{
						
						$senha = sha1($senha);
						session_start();
						$screen4 = mysqli_query($con,"INSERT INTO cadastro VALUES(NULL,'$nome','$email','$senha','$proposta','1','NULL')");
						
						if($screen4 == 1){
							$exe = mysqli_query($con,"SELECT id_usuario,email FROM cadastro WHERE email = '$email'");
							$dados = mysqli_fetch_row($exe);
							$_SESSION["id"] = $dados["0"];
							
							$_SESSION["screen"] = $screen4;
							echo"<script>location.href='index.php';</script>";
						}else{
								echo"<script>alert('ERRO');location.href='index.php';</script>";
							}
					}
				}else{
					echo"<script>alert('Campo vazio');location.href='index.php';</script>";
				}	
			}
		?>