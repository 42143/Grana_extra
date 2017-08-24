<?php
	include"config.php";
	session_start();
	$id = $_SESSION["id"];
	$message = $_GET['message'];
	$messageTime = time();
	
	$chats = mysqli_query($con,"SELECT a.id_usuario,b.id_usuario AS usuario FROM boleto AS a INNER JOIN orcamento AS b ON a.id_orcamento = b.id_orcamento 
	WHERE a.flag_status = '1' AND b.id_usuario = '$id' OR a.flag_status = '1' AND a.id_usuario = '$id'");
		$d_chats = mysqli_fetch_array($chats);
		
		if($d_chats["id_usuario"]  == $id){
			
			$result = mysqli_query($con,"INSERT INTO chats VALUES (NULL,'$message','$id','$d_chats[usuario]','$messageTime')");
		}else if($d_chats["usuario"] == $id){
			
			$result = mysqli_query($con,"INSERT INTO chats VALUES (NULL,'$message','$id','$d_chats[id_usuario]','$messageTime')");
		}
?>