﻿<?php
if(isset($_GET["id"])){
	include"config.php";
	session_start();
	$id = $_SESSION["id"];
	$id_upgrade = $_GET["id"];
		$d_prop = mysqli_query($con,"SELECT id_upgrade,valor,tipo_upgrade FROM valor_upgrade WHERE id_upgrade = '$id_upgrade'");
		$prop = mysqli_fetch_array($d_prop);
			
			$verif_boleto = mysqli_query($con,"SELECT id_boleto FROM boleto_upgrade WHERE id_usuario = '$id'");
				$ver = mysqli_num_rows($verif_boleto);
				$id_boleto = mysqli_fetch_row($verif_boleto);
					
					if($ver == 0){
						date_default_timezone_set("America/sao_Paulo");
						$data = date("Y-m-d");
							$dias_de_prazo_para_pagamento = 5;
							$vencimento = date("Y-m-d", time() + ($dias_de_prazo_para_pagamento * 86400));
						mysqli_query($con,"INSERT INTO boleto_upgrade VALUES(NULL,'$data','$vencimento','$id','0','$id_upgrade')"); 
					}else{
						date_default_timezone_set("America/sao_Paulo");
						$data = date("Y-m-d");
							$dias_de_prazo_para_pagamento = 5;
							$vencimento = date("Y-m-d",time() + ($dias_de_prazo_para_pagamento * 86400));
						mysqli_query($con,"UPDATE boleto_upgrade SET data_boleto = '$data',vencimento = '$vencimento',id_upgrade='$id_upgrade' WHERE id_boleto = '$id_boleto[0]' "); 
					}
	// +----------------------------------------------------------------------+
	// | BoletoPhp - Versão Beta                                              |
	// +----------------------------------------------------------------------+
	// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
	// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
	// | Você deve ter recebido uma cópia da GNU Public License junto com     |
	// | esse pacote; se não, escreva para:                                   |
	// |                                                                      |
	// | Free Software Foundation, Inc.                                       |
	// | 59 Temple Place - Suite 330                                          |
	// | Boston, MA 02111-1307, USA.                                          |
	// +----------------------------------------------------------------------+
	// +----------------------------------------------------------------------+
	// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
	// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
	// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa				        |
	// | 														                                   			  |
	// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
	// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
	// +----------------------------------------------------------------------+
	// +--------------------------------------------------------------------------------------------------------+
	// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>              		             				|
	// | Desenvolvimento Boleto Banco do Brasil: Daniel William Schultz / Leandro Maniezo / Rogério Dias Pereira|
	// +--------------------------------------------------------------------------------------------------------+
	// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
	// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//
	// DADOS DO BOLETO PARA O SEU CLIENTE
	$dias_de_prazo_para_pagamento = 5;
	$taxa_boleto = 0.00; //2.95;
	$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
	$valor_cobrado = "$prop[valor]"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado = str_replace(",", ".",$valor_cobrado);
	$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
	$dadosboleto["nosso_numero"] = "87654";
	$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
	$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
	$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
	$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
	$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] = "Nome do seu Cliente";
	$dadosboleto["endereco1"] = "Endereço do seu Cliente";
	$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 00000-000";
	// INFORMACOES PARA O CLIENTE
	$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Nonononono";
	$dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
	$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";
	// INSTRUÇÕES PARA O CAIXA
	$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
	$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
	$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
	$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";
	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["quantidade"] = "10";
	$dadosboleto["valor_unitario"] = "10";
	$dadosboleto["aceite"] = "N";		
	$dadosboleto["especie"] = "R$";
	$dadosboleto["especie_doc"] = "DM";
	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
	// DADOS DA SUA CONTA - BANCO DO BRASIL
	$dadosboleto["agencia"] = "9999"; // Num da agencia, sem digito
	$dadosboleto["conta"] = "99999"; 	// Num da conta, sem digito
	// DADOS PERSONALIZADOS - BANCO DO BRASIL
	$dadosboleto["convenio"] = "7777777";  // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
	$dadosboleto["contrato"] = "999999"; // Num do seu contrato
	$dadosboleto["carteira"] = "18";
	$dadosboleto["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)
	// TIPO DO BOLETO
	$dadosboleto["formatacao_convenio"] = "7"; // REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos
	$dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos
	/*
	#################################################
	DESENVOLVIDO PARA CARTEIRA 18
	- Carteira 18 com Convenio de 8 digitos
	  Nosso número: pode ser até 9 dígitos
	- Carteira 18 com Convenio de 7 digitos
	  Nosso número: pode ser até 10 dígitos
	- Carteira 18 com Convenio de 6 digitos
	  Nosso número:
	  de 1 a 99999 para opção de até 5 dígitos
	  de 1 a 99999999999999999 para opção de até 17 dígitos
	#################################################
	*/
	// SEUS DADOS
	if($id_upgrade == "1"){
		$dadosboleto["identificacao"] = "Freelancer Classic";
	}else{
		$dadosboleto["identificacao"] = "Freelancer Premium";
	}
	$dadosboleto["cpf_cnpj"] = "";
	$dadosboleto["endereco"] = "";
	$dadosboleto["cidade_uf"] = "";
	$dadosboleto["cedente"] = "Coloque a Razão Social da sua empresa aqui";
	// NÃO ALTERAR!
	include("funcao_bb.php"); 
	include("layout_bb.php");
}else{
	header("location:panel.php");
}	
?>