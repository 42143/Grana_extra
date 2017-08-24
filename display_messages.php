<?php
	include"config.php";
		$tenMinutesAgo = time() - 600;
		session_start();
		$id = $_SESSION["id"];
			$user_msg = mysqli_query($con,"SELECT id_usuario FROM chats WHERE id_usuario_recebe = '$id'");
				$idUser = mysqli_fetch_array($user_msg);
				
		$result = mysqli_query($con,"SELECT a.chats,a.tempo_msg,b.foto FROM chats AS a INNER JOIN cadastro AS b ON a.id_usuario = b.id_usuario 
		WHERE a.id_usuario = '$idUser[id_usuario]' AND a.id_usuario_recebe = '$id' OR a.id_usuario = '$id' AND a.id_usuario_recebe = '$idUser[id_usuario]' 
		OR a.tempo_msg > " .$tenMinutesAgo. " ORDER BY a.tempo_msg");
			while ($row = mysqli_fetch_assoc($result)) {
				date_default_timezone_set('America/Sao_Paulo');
				$messageTime = date('g:ia',$row['tempo_msg']);
				echo "<p><br><img style='width:50px;height:50px;border-radius:50px;' src='$row[foto]'/> <em style='font-size:15px;'>(" . $messageTime . ")</em>  " . $row['chats'] . "</p>";
			}

?>