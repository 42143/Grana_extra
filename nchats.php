<?php include"config.php";
	session_start();
	if(!isset($_SESSION["id"])){
		header("location:index.php");
	}else{
		$id = $_SESSION["id"];
		$chats = mysqli_query($con,"SELECT a.id_usuario,b.id_usuario AS usuario FROM boleto AS a INNER JOIN orcamento AS b ON a.id_orcamento = b.id_orcamento 
		WHERE a.flag_status = '1' AND b.id_usuario = '$id' OR a.flag_status = '1' AND a.id_usuario = '$id'");
			$d_chats = mysqli_num_rows($chats);
		if($d_chats == 0){
			header("location:panel.php");
		}
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!--CSS-->
		<link rel="shortcut icon" href="imagens/favicon.png">
		<link rel="stylesheet" href="css/style_panel.css">
		<!--Jquery-->
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/common_panel.js"></script>
		
		<script src='js/sign_in_out.js'></script>
		<script src='js/send_message.js'></script>
		<script src='js/display_chat.js'></script>
	</head>
	<body>
		<div class="main">
			<div class="Screen Screen1">
			<?php
					$array_language = array("1" => "language/pt_br.php","2" => "language/en_us.php");
								if(!isset($_GET["language"])){
									$_SESSION["language"] = "1";
										if(array_key_exists($_SESSION["language"],$array_language)){
											include $array_language[$_SESSION["language"]];
										}
								}else if(isset($_GET["language"])){
									$_SESSION["language"] = $_GET["language"];
										if(array_key_exists($_SESSION["language"],$array_language)){
											include $array_language[$_SESSION["language"]];
										}
								}
				?>
				<div class="content">
					<div class="means">	
						<!--panel_profile-->
						<?php include"panel_profile.php";?>
						<div class="panel create_projects">
							<div class="header_create_projects">Caixa de mensagens
								<?php include"alert_folder.php";?>
							</div>
								<div class="chats">
									<div class="contacts">
									<?php
										$id = $_SESSION["id"];
										$qtnContacts = mysqli_query($con,"SELECT id_usuario FROM chats WHERE id_usuario_recebe = '$id'");
											$valContacts = mysqli_fetch_array($qtnContacts);
											
										$contacts = mysqli_query($con,"SELECT id_usuario,nome,foto FROM cadastro WHERE id_usuario = '$valContacts[id_usuario]'");
										while($pcontacts = mysqli_fetch_array($contacts)){?>
											<div class="pcontacts">
													<center>
													<img style="width:80px;height:80px;" src="<?php echo $pcontacts['foto']?>"/>
														<br>
													<span style="font-size:13px;"><?php echo $pcontacts['nome']?></span>
													</center>
												</div>
											<!---<script>
												$(function(){
													$(".pcontacts").click(function(){
														alert(idChat);
														window.localStorage.setItem('idChat', '<?php //echo $valContacts['id_usuario'];?>');
													});
												});
											</script>--->	
										<?php
										}
										?>
									</div>
									<div class="Cashier_text" id="chatArea"></div>
									<div class="meng">
										<form name='newMessage' class='newMessage' action='' onsubmit='return false'>
											<textarea name='newMessageContent' id='newMessageContent' placeholder=''></textarea>
											<input type='submit' id='newMessageSend' value='Enviar' />
										</form>
									</div>
								</div>	
						</div>	
					</div>			
				</div>
			</div>		
		</div>	
		<?php include "header_footer.php";?> 
	</body>
</html>	