									<?php 
										include"config.php";
											$id = $_SESSION["id"];
											
										$qunt = mysqli_query($con,"SELECT a.id_orcamento_alert,a.valor,a.prazo,a.comentarios,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,b.nome,b.foto,c.id_projeto,c.id_usuario FROM orcamento_alert AS a 
											INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE c.id_usuario = '$id'");
										$count = mysqli_num_rows($qunt);
										
										$qunt_down = mysqli_query($con,"SELECT a.id_download_alert,a.id_projeto,a.arquivo,b.nome,b.foto,c.nome_projeto FROM download_alert AS a 
										INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE c.id_usuario = '$id'");
										$count_down = mysqli_num_rows($qunt_down);
										
										$chats = mysqli_query($con,"SELECT a.id_usuario,b.id_usuario AS usuario FROM boleto AS a INNER JOIN orcamento AS b ON a.id_orcamento = b.id_orcamento 
										WHERE a.flag_status = '1' AND b.id_usuario = '$id' OR a.flag_status = '1' AND a.id_usuario = '$id'");
										$d_chats = mysqli_fetch_array($chats);
										$id_recebe = $d_chats["id_usuario"];
										$id_user = $d_chats["usuario"];
										$v_chats = mysqli_num_rows($chats);
									?>
									<!---Notificação--->
								<div style="font-size:16px;float:right; margin-right:40px;margin-top:5px;cursor:pointer;" class="btn_alert_folder">
									Notificação&nbsp;<img src="imagens/icon.png"/>&nbsp;
									<span class="count_alert" style="display:none;background-color:red;border:solid 3px red;border-radius:4px;font-size:13px;">
										<?php $quant_num  = ($count_down + $count);if($quant_num >= 1){echo$quant_num;}?>
									</span>
								</div>
									<!---caixa de chats--->
								<?php 
									if($id == $id_recebe || $id == $id_user){	
										if($v_chats == 1){?>
											<div style="width:25px;height:25px;float:right;margin-right:30px;cursor:pointer;margin-top:5px;">
												<a href="nchats.php">
													<img src="imagens/icon5.png"/>
												</a>	
											</div>
										<?php
										}
									}else{
										echo"
											<div style='width:25px;height:25px;float:right;margin-right:30px;margin-top:5px;'>
												<img src='imagens/icon4.png'/>
											</div>
										";
									}
									?>	
									<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
									<script type="text/javascript">
											var count = "<?php echo $count;?>";
											var count_down = "<?php echo $count_down;?>";
										$(function(){
											if(count >= 1){
												$(".count_alert").show();
												$(".btn_alert_folder").click(function(){
													$(".alert_folder_opened").toggle();
												});		
											}else if(count_down >= 1){
												$(".count_alert").show();
												$(".btn_alert_folder").click(function(){
													$(".alert_folder_opened").toggle();
												});
											}
										});
									</script>
								<div class="alert_folder_opened" style="display:none;background:#fff;width:265px;height:500px;padding-left:10px;padding-right:10px;padding-top:10px;font-style:none;
																		margin-top:10px;margin-left:50%;z-index:2;position:absolute;border:solid 1px #ccc;color:#000;font-size:15px;overflow:auto;">
									<?php 
											$proposal = mysqli_query($con,"SELECT a.id_orcamento_alert,a.valor,a.prazo,a.comentarios,DATE_FORMAT(a.tempo,'%d/%m/%y') AS tempo,b.nome,b.foto,c.id_projeto,c.id_usuario FROM orcamento_alert AS a 
											INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario INNER JOIN cria_projeto AS c ON a.id_projeto = c.id_projeto WHERE c.id_usuario = '$id' ORDER BY a.tempo DESC");
												//$qtn_proposal = mysqli_num_rows($proposal);
													//if($qtn_proposal >= 1 ){
														while($d_prop = mysqli_fetch_array($proposal)){?>
															
																<div class='cashier_alert' style='width:255px;height:200px;'>
																	<div class='photo_contractor'>
																		<img style='width:50px;height:50px;border-radius:50px;background:#F7F8F9;background-repeat:no-repeat;background-position:center;' src="<?php echo$d_prop['foto'];?>"/>								
																	</div>
																	<span class='name_user'><?php echo$d_prop["nome"];?></span>
																	<span style="float:right;"><?php echo$d_prop["tempo"];?></span>
																	<hr>
																	<span><?php echo$d_prop["comentarios"];?></span>
																	<br>
																	<span>Valor proposta <u><?php echo$d_prop["valor"];?></u> | Prazo <u><?php echo$d_prop["prazo"];?></u></span>
																	<hr>
															
																	<form action='sends_proposal.php' method='post'>
																		<input type='hidden' name='accept' value='1'/>
																		<input type='hidden' name='orcamento' value='<?php echo$d_prop["id_orcamento_alert"];?>'/>
																		<input class='btn_gh' type='submit' value='Aceitar'/>
																	</form>
																	<form action='sends_proposal.php' method='post'>
																		<input type='hidden' name='pending' value='2'/>
																		<input type='hidden' name='orcamento' value='<?php echo$d_prop["id_orcamento_alert"];?>'/>
																		<input class='btn_hg' type='submit' value='Pendente'/>
																	</form>
																	<form action='sends_proposal.php' method='post'>
																		<input type='hidden' name='refuse' value='3'/>
																		<input type='hidden' name='orcamento' value='<?php echo$d_prop["id_orcamento_alert"];?>'/>
																		<input class='btn_gh' type='submit' value='Recusar'/>
																	</form>
																</div>
													<?php				
														}
													//}
													while($down_arq = mysqli_fetch_array($qunt_down)){?>
														<div class='cashier_alert' style='width:255px;height:200px;'>
																	<div class='photo_contractor'>
																		<img style='width:50px;height:50px;border-radius:50px;background:#F7F8F9;background-repeat:no-repeat;background-position:center;' src="<?php echo$down_arq['foto'];?>"/>								
																	</div>
																	<span class='name_user'><?php echo$down_arq["nome"];?></span>
																	<hr>
																	<span>Projeto<strong>" <?php echo$down_arq["nome_projeto"];?> "</strong> está disponivel para download</span>
																	<hr>
																	<style>
																		.download_arq:hover{background:#00BA4A;color:#fff;}
																	</style>
																	<a href="<?php echo$down_arq['arquivo'];?>"onclick="location.href='download.php?id=<?php echo$down_arq['id_download_alert'];?>';" target="_blank">
																		<div class="download_arq" style="width:255px;height:35px;border:solid 1px #ccc;text-align:center;font-size:20px;padding-top:5px;">Download</div>
																	</a>	
														</div>
													<?php
													}
													?>
								</div>