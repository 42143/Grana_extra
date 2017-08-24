<?php
	include"config.php";
	if(isset($_POST["ability"])){
		$ability = $_POST["ability"];
			
			$pasta_dir = "arquivos/";
			if(!file_exists($pasta_dir)){
				mkdir($pasta_dir);
			}
			session_start();			
				$id = $_SESSION["id"];
				$cadastro = mysqli_query($con,"SELECT nome FROM cadastro WHERE id_usuario = '$id'");
				$dados = mysqli_fetch_row($cadastro);
				
					$nome_arquivo = sha1($id."_id_".$dados[0]);
					$bd_arquivo = $pasta_dir."$nome_arquivo.txt";
					
				error_reporting(0);
				
				$vl = str_split($ability);	
				$file = @file($bd_arquivo);
				$file = implode($file);
				$file = str_split($file);
				$result = array_diff($vl , $file);
				if($result === $vl){
					
						$fp = fopen($pasta_dir."$nome_arquivo.txt", "a");
						$escreve = fwrite($fp,"$ability");
						fclose($fp);
						
						$set_ability = mysqli_query($con,"SELECT habilidade FROM editar_perfil WHERE habilidade = '$bd_arquivo'");
						$con_ability = mysqli_num_rows($set_ability);
							if($con_ability == 0){
								mysqli_query($con,"INSERT INTO editar_perfil(habilidade,id_usuario)VALUES('$bd_arquivo','$id')");
							}
						$fg = file($bd_arquivo);
						$gf = implode($fg);
						$fgs = str_split($gf);
							foreach($fgs as $value){
								$bus_ablility = mysqli_query($con,"SELECT * FROM habilidade WHERE id_habilidade = '$value'");
								$mos_ability = mysqli_fetch_array($bus_ablility);
								echo "<div style='heigth:17px;border:solid 2px #fff;'>".$mos_ability['habilidade'].
									"<button value='$value' id='myBtn' onclick='myFunction()'
										style='float:right;background:#F7F8F9;border:none;color:red;cursor:pointer;'>Excluir</button>
									</div>";
							}
				}else{echo "<b style='color:red'>habilidade já foi adicionada</b>";
					$fg = file($bd_arquivo);
					$gf = implode($fg);
					$fgs = str_split($gf);
					foreach($fgs as $value){
								$bus_ablility = mysqli_query($con,"SELECT * FROM habilidade WHERE id_habilidade = '$value'");
								$mos_ability = mysqli_fetch_array($bus_ablility);
								echo "<div style='heigth:17px;border:solid 2px #fff;'>".$mos_ability['habilidade'].
									"<button value='$value' id='myBtn' onclick='myFunction()'
										style='float:right;background:#F7F8F9;border:none;color:red;cursor:pointer;'>Excluir</button>
									</div>";
							}
				}
	}else if(isset($_POST["abilitydel"])){
		$abilitydel = $_POST["abilitydel"];
		
			$pasta_dir = "arquivos/";
		
		session_start();			
			$id = $_SESSION["id"];
			$cadastro = mysqli_query($con,"SELECT nome FROM cadastro WHERE id_usuario = '$id'");
			$dados = mysqli_fetch_row($cadastro);
			
				$nome_arquivo = sha1($id."_id_".$dados[0]);
				$bd_arquivo = $pasta_dir."$nome_arquivo.txt";
	
			
			$file = file($bd_arquivo);
			$file = implode($file);
			$file = str_split($file);
			$val = str_split($abilitydel);
			$result = array_diff($file , $val);
			$result  = implode($result);
			
		$fp = fopen($pasta_dir."$nome_arquivo.txt", "w");
		$escreve = fwrite($fp,"$result");
		fclose($fp);
		
		$fgs = str_split($result);
		foreach($fgs as $value){
			$bus_ablility = mysqli_query($con,"SELECT * FROM habilidade WHERE id_habilidade = '$value'");
			$mos_ability = mysqli_fetch_array($bus_ablility);
			echo "<div style='heigth:17px;border:solid 2px #fff;'>".$mos_ability['habilidade'].
				"<button value='$value' id='myBtn' onclick='myFunction()'
				style='float:right;background:#F7F8F9;border:none;color:red;cursor:pointer;'>Excluir</button>
				</div>";
		}
	}else{
		$csv = $_POST["csv"];
		$exp = $_POST["exp"];
			session_start();
			$id = $_SESSION["id"];
		if(strlen($csv) <= 200 || strlen($exp) <= 200){
			$value = mysqli_query($con,"UPDATE editar_perfil SET conte_sobre ='$csv',conte_experiencia ='$exp' WHERE id_usuario = '$id'");
			header("location:panel.php");
		}else{echo"Verificar as quantidade de caracteres escrita";}
	}			
?>