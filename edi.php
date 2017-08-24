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
							<div class="header_create_projects">Informações para seu projetos</div>
								<form action="#" method="post">
									<label for="name_project">Nome do projeto</label>
											<br>
										<input type="text" id="name_project" name="name_project"/>
											<br><br>
											<hr>
									<label for="area_summary">Resumo do seu projeto</label>
											<br>
										<textarea rows="3" cols="80" id="area_summary" name="area_summary"></textarea>
											<br><br>
											<hr>
									<label for="Reference">Referência</label>
											<br>
										<input type="text" id="Reference" name="Reference"/>
											<br><br>
											<hr>
									<span style="margin-left:25px;float:left;">Adicionar imagens ao projetos</span>	
									<label for="add_imagens" class="btn_add_imagens">Adicione</label>
											<br>
										<input type="file" id="add_imagens" class="add_imagens" name="add_imagens"/>
											<br><br>
											<hr>
									<label for="area_Describe">Descreva seu projeto</label>
											<br>
										<textarea rows="5" cols="80" id="area" name="area"></textarea>
											<br><br>
											<hr>
									<label for="btn_account_basic">
										<input type="radio" id="btn_account_basic" name="freelar_escolhar" value="1"/>
										<div class="freelar_escolhar btn_account_basic">
											<span style="font-size:20px;margin-left:30px;"><strong>Freela Basic</strong></span>										
											<svg class="svg0">
												<style type="text/css">
													.doll0{fill:#00CC66;}
												</style>
												<path class="doll0" d="M22.3,26.5c-0.2,0.5-0.4,1-0.6,1.5c3.3,1,5.5,2.9,5.5,5c0,3.2-5.2,5.8-11.5,5.8c-6.4,0-11.5-2.6-11.5-5.8
													c0-2.2,2.3-4.1,5.8-5.1c-0.2-0.5-0.5-0.9-0.8-1.4c-4.6,1.2-7.8,3.6-7.8,6.5c0,4,6.4,7.3,14.3,7.3S30,37,30,33
													C30,30.2,26.8,27.7,22.3,26.5z"/>
												<circle class="doll0" cx="15.7" cy="7.3" r="4.6"/>
												<polygon class="doll0" points="10.7,13 20.7,13 20.7,15 21.7,15 21.7,24 18.7,24 18.8,34 12.7,34 12.7,24 9.7,23.5 9.7,15 10.6,14.5"/>
											</svg>
											<hr style="margin-top:20px;width:182px;">	
											<span>Seus projetos serão mostrado para contas básicas</span>
										</div>
									</label>
									<label for="btn_account_classic">
										<input type="radio" id="btn_account_classic" name="freelar_escolhar" value="2"/>
										<div class="freelar_escolhar btn_account_classic">
											<span style="font-size:20px;margin-left:30px;"><strong>Freela Classic</strong></span>
											<svg class="svg1">
												<style type="text/css">
													.doll1{fill:#FF6600;}
												</style>
												<path class="doll1" d="M22.3,26.5c-0.2,0.5-0.4,1-0.6,1.5c3.3,1,5.5,2.9,5.5,5c0,3.2-5.2,5.8-11.5,5.8c-6.4,0-11.5-2.6-11.5-5.8
													c0-2.2,2.3-4.1,5.8-5.1c-0.2-0.5-0.5-0.9-0.8-1.4c-4.6,1.2-7.8,3.6-7.8,6.5c0,4,6.4,7.3,14.3,7.3S30,37,30,33
													C30,30.2,26.8,27.7,22.3,26.5z"/>
												<circle class="doll1" cx="15.7" cy="7.3" r="4.6"/>
												<polygon class="doll1" points="10.7,13 20.7,13 20.7,15 21.7,15 21.7,24 18.7,24 18.8,34 12.7,34 12.7,24 9.7,23.5 9.7,15 10.6,14.5"/>
											</svg>
											<hr style="margin-top:20px;width:182px;">
											<span>Freelancer com projetos ja concluido</span>	
										</div>
									</label>
									<label for="btn_account_premier">
										<input type="radio" id="btn_account_premier" name="freelar_escolhar" value="3"/>
										<div class="freelar_escolhar btn_account_premier">
												<span style="font-size:20px;margin-left:30px;"><strong>Freela Premiun</strong></span>
												
											<svg class="svg2">
												<style type="text/css">
													.doll2{fill:#199ED8;}
												</style>
												<path class="doll2" d="M22.3,26.5c-0.2,0.5-0.4,1-0.6,1.5c3.3,1,5.5,2.9,5.5,5c0,3.2-5.2,5.8-11.5,5.8c-6.4,0-11.5-2.6-11.5-5.8
													c0-2.2,2.3-4.1,5.8-5.1c-0.2-0.5-0.5-0.9-0.8-1.4c-4.6,1.2-7.8,3.6-7.8,6.5c0,4,6.4,7.3,14.3,7.3S30,37,30,33
													C30,30.2,26.8,27.7,22.3,26.5z"/>
												<circle class="doll2" cx="15.7" cy="7.3" r="4.6"/>
												<polygon class="doll2" points="10.7,13 20.7,13 20.7,15 21.7,15 21.7,24 18.7,24 18.8,34 12.7,34 12.7,24 9.7,23.5 9.7,15 10.6,14.5"/>
											</svg>
											<hr style="margin-top:20px;width:182px;">
											<span>Freelancer que envestiu em conta Premiun  e boa reputação</span>
										</div>
									</label>		
										<input type="submit" value="Criar projeto" class="btn_create_project"/>	
								</form>
						</div>	
					</div>			
				</div>
			</div>		
		</div>		
		<?php include "header_footer.php";?> 
	</body>
</html>	