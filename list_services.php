								<?php
									include"config.php";
									if(!isset($_POST["idServ"])){
										echo"<script>alert('Seleciona algum serviço');</script>";
									}else{
										$id_services = $_POST["idServ"];
										foreach($id_services as $values){
											$project = mysqli_query($con,"SELECT a.id_projeto,a.nome_projeto,a.resumo_projeto,DATE_FORMAT(a.tempo,'%d/%m/%y')AS tempo,b.nome,b.foto 
												FROM cria_projeto AS a INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario WHERE servico = '$values' ORDER BY tempo DESC");
												while($data_project = mysqli_fetch_array($project)){?>
													<div class='lists_contractor'>
														<div class='perfil_contractor'>
															<div class='photo_contractor'>
																<img class='photo_contractor' src="<?php echo$data_project['foto'];?>"/>
															</div>
															<span style='margin-left:55px;'><?php echo $data_project["nome"];?></span>
															<span style='margin-left:330px;'><?php echo $data_project["tempo"];?></span>
														</div>
														<div class='title_contractor' style='font-size:18px;font-weight:bold;margin-left:20px;'>	
															<span><?php echo $data_project["nome_projeto"];?></span>
														</div>	
														<span><?php echo utf8_encode($data_project["resumo_projeto"]);?></span>
														<a href='preview_project.php?id_projeto=<?php echo $data_project["id_projeto"];?>'>
															<div class='menu btn_contractor'>Veja o projeto</div>
														</a>	
													</div>
														<hr>
										<?php
												} 
										}
									}
										?>
										
									