<?php	
		if(isset($_POST["idp"])){
			$id_project = $_POST["idp"];
			//echo $id_project;
			?>
			<center>
			Faça upload dos Arquivos do projeto
					<br>
				<form action="conclusion.php" method="post" enctype="multipart/form-data">
					<label for="arqFrellar">
						<div class="btn_upload">Upload dos Arquivos</div>
					</label>
					<input type="file" name="arq" id="arqFrellar" class="file_arq" accept=".zip,.rar" onchange="fileArq()"/>
					<input type="hidden" name="id_project" value="<?php echo $id_project;?>"/>
					<div style="width:250px;">
						<span id="nomeArq" style="font-size:15px;"></span>
					</div>	
					<input type="submit" value="Enviar" class="btn_get"/>
				</form>
					<div class="btn_end_cancellation">Fechar</div>
			</center>
				<hr style="width:500px;border:solid 1px #ccc;"/>
					<div style="margin-left:15px;">
						<span style="font-size:15px;">Os arquivos deveram está compactada para enviar ao contratante</span>
					</div>	
			<script>
				function fileArq(){
					var arq = document.getElementById("arqFrellar").value;
					document.getElementById("nomeArq").innerHTML = arq;
					//alert(arq);
				}
				$(function(){
					$(".btn_end_cancellation").click(function(){
						$(".add_conclusion,.mask_black").hide();
					});
				});
			</script>
	<?php	
		}else if(isset($_FILES["arq"])){
			$arq = $_FILES["arq"];
			$id_project = $_POST["id_project"];
			
			//print_r($_FILES["arq"]);
			
			$pasta_dir = "projetos/";
				if(!file_exists($pasta_dir)){
						mkdir($pasta_dir);
					}
				$exe = preg_match("/\.(zip|rar){1}$/i", $arq["name"], $ext);
					if($exe == 1){
						$nome_arq = md5(uniqid(time())) . "." . $ext[1];
						
							$arquivo_nome = $pasta_dir . $nome_arq;
							move_uploaded_file($arq["tmp_name"], $arquivo_nome);
				
							session_start();
							$id = $_SESSION["id"];
							
							include"config.php";
							$test = mysqli_query($con,"INSERT INTO download_alert VALUES(NULL,'$id_project','$id','$arquivo_nome')");
								if($test == 1){
									echo"<script>alert('Arquivo enviado com sucesso');history.back();</script>";
								}else{echo"<script>alert('Erro no envio');history.back();</script>";}
					}else{
						echo"<script>alert('Arquivo não esta compactado');history.back();</script>";
					}
				
		}
		?>		