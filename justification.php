<?php include"config.php";
		if(isset($_POST["justify"])){
			$justify = $_POST["justify"];
			$id_usuario = $_POST["id_usuario"];
			$id_projeto = $_POST["id_projeto"];
			$id_orcamento = $_POST["id_orcamento"];
			
				$exe = mysqli_query($con,"INSERT INTO justificao VALUES (NULL,'$justify','$id_usuario','$id_projeto','$id_orcamento')");
					if($exe == 1){
						$exe = mysqli_query($con,"UPDATE orcamento SET flag_proposta = '3' WHERE id_projeto = '$id_projeto'");
						if($exe == 1){
							header("location:my_projects.php");
						}
					}
		}else{
			
		
				$myJustication = $_POST["myJustication"];
					$value_arrey = str_split($myJustication);
					//print_r($value_arrey);
						$exe = mysqli_query($con,"SELECT b.id_projeto,b.nome_projeto,c.nome FROM orcamento AS a INNER JOIN cria_projeto AS b ON a.id_projeto = b.id_projeto 
						INNER JOIN cadastro AS c ON a.id_usuario = c.id_usuario WHERE a.id_orcamento_ind = '$value_arrey[0]'");
							$dados = mysqli_fetch_array($exe);
			?>
				<center>
					<span>Você está prestes a cancelar a proposta enviada por&nbsp;<strong><?php echo$dados["nome"];?></strong>&nbsp;referente ao projeto&nbsp;
					<strong><?php echo$dados["nome_projeto"];?></strong>&nbsp;Deseja continuar ?</span>
						<br><br>
						<form action="justification.php" method="post">
							<label for="textarea_justify">Justifique seu cancelamento</label>
							<textarea rows="5" cols="80" name="justify"></textarea>
							<input type="hidden" name="id_usuario" value="<?php echo$value_arrey[1];?>"/>
							<input type="hidden" name="id_projeto" value="<?php echo$dados["id_projeto"];?>"/>
							<input type="hidden" name="id_orcamento" value="<?php echo$value_arrey[0];?>"/>
								<br><br>
							<div class="btn_end_cancellation">Fechar</div>	
							<input type="submit" value="Comfirmar cancelamento"/>	
						</form>
				</center>
					<script src="js/jquery-1.11.1.min.js"></script>
					<script>
						$(function(){
							$(".btn_end_cancellation").click(function(){
								$(".justify_cancellation,.mask_black").hide();
							});
						});
					</script>
	<?php				
		}
		?>