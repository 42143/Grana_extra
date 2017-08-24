<?php 
	include"config.php";
	$id = $_SESSION["id"];
		$d_bom = mysqli_query($con,"SELECT bom FROM reputacao WHERE bom = '1' AND id_usuario = '$id'");
		$d_regula = mysqli_query($con,"SELECT regula FROM reputacao WHERE regula = '1' AND id_usuario = '$id'");
		$d_ruim = mysqli_query($con,"SELECT ruim FROM reputacao WHERE ruim = '1' AND id_usuario = '$id'");
			$value_bom = mysqli_num_rows($d_bom);
			$value_regula = mysqli_num_rows($d_regula);
			$value_ruim = mysqli_num_rows($d_ruim);
			
			$half = ($value_regula /2);
			$result = ($value_bom + $half)/2;
			$result = (($result) - ($value_ruim + $half)); 
			//echo "<script>alert('$result');</script>";
	if($result > 98.7){
		echo"
			<polygon class='st3' points='149.1,6.9 154.6,28.3 149.1,49.6 159.2,28.1 	'/>
			<polygon class='st4' points='159.2,28.1 201,28.1 149.1,6.9 	'/>
			<polygon class='st5' points='159.2,28.1 149.1,49.6 201,28.1 	'/>
		";	
	}else if($result > 97.4){
		echo"
			<polygon class='st3' points='147.1,6.9 152.6,28.3 147.1,49.6 157.2,28.1 	'/>
			<polygon class='st4' points='157.2,28.1 199,28.1 147.1,6.9 	'/>
			<polygon class='st5' points='157.2,28.1 147.1,49.6 199,28.1 	'/>
		";
	}else if($result > 96.1){
		echo"
			<polygon class='st3' points='145.1,6.9 150.6,28.3 145.1,49.6 155.2,28.1 	'/>
			<polygon class='st4' points='155.2,28.1 197,28.1 145.1,6.9 	'/>
			<polygon class='st5' points='155.2,28.1 145.1,49.6 197,28.1 	'/>	
		";
	}else if($result > 94.8){
		echo"
			<polygon class='st3' points='145.1,6.9 150.6,28.3 145.1,49.6 155.2,28.1 	'/>
			<polygon class='st4' points='155.2,28.1 197,28.1 145.1,6.9 	'/>
			<polygon class='st5' points='155.2,28.1 145.1,49.6 197,28.1 	'/>
		";
	}else if($result > 93.5){
		echo"
			<polygon class='st3' points='143.1,6.9 148.6,28.3 143.1,49.6 153.2,28.1 	'/>
			<polygon class='st4' points='153.2,28.1 195,28.1 143.1,6.9 	'/>
			<polygon class='st5' points='153.2,28.1 143.1,49.6 195,28.1 	'/>
		";
	}else if($result > 92.2){
		echo"
			<polygon class='st3' points='141.1,6.9 146.6,28.3 141.1,49.6 151.2,28.1 	'/>
			<polygon class='st4' points='151.2,28.1 193,28.1 141.1,6.9 	'/>
			<polygon class='st5' points='151.2,28.1 141.1,49.6 193,28.1 	'/>
		";
	}else if($result > 90.9){
		echo"
			<polygon class='st3' points='139.1,6.9 144.6,28.3 139.1,49.6 149.2,28.1 	'/>
			<polygon class='st4' points='149.2,28.1 191,28.1 139.1,6.9 	'/>
			<polygon class='st5' points='149.2,28.1 139.1,49.6 191,28.1 	'/>
		";
	}else if($result > 89.6){
		echo"
			<polygon class='st3' points='137.1,6.9 142.6,28.3 137.1,49.6 147.2,28.1 	'/>
			<polygon class='st4' points='147.2,28.1 189,28.1 137.1,6.9 	'/>
			<polygon class='st5' points='147.2,28.1 137.1,49.6 189,28.1 	'/>
		";
	}else if($result > 88.3){
		echo"
			<polygon class='st3' points='135.1,6.9 140.6,28.3 135.1,49.6 145.2,28.1 	'/>
			<polygon class='st4' points='145.2,28.1 187,28.1 135.1,6.9 	'/>
			<polygon class='st5' points='145.2,28.1 135.1,49.6 187,28.1 	'/>
		";
	}else if($result > 87){
		echo"
			<polygon class='st3' points='133.1,6.9 138.6,28.3 133.1,49.6 143.2,28.1 	'/>
			<polygon class='st4' points='143.2,28.1 185,28.1 133.1,6.9 	'/>
			<polygon class='st5' points='143.2,28.1 133.1,49.6 185,28.1 	'/>
		";
	}else if($result > 85.7){
		echo"
			<polygon class='st3' points='131.1,6.9 136.6,28.3 131.1,49.6 141.2,28.1 	'/>
			<polygon class='st4' points='141.2,28.1 183,28.1 131.1,6.9 	'/>
			<polygon class='st5' points='141.2,28.1 131.1,49.6 183,28.1 	'/>
		";
	}else if($result > 84.4){
		echo"
			<polygon class='st3' points='131.1,6.9 136.6,28.3 131.1,49.6 141.2,28.1 	'/>
			<polygon class='st4' points='141.2,28.1 183,28.1 131.1,6.9 	'/>
			<polygon class='st5' points='141.2,28.1 131.1,49.6 183,28.1 	'/>
		";
	}else if($result > 83.1){
		echo"
			<polygon class='st3' points='129.1,6.9 134.6,28.3 129.1,49.6 139.2,28.1 	'/>
			<polygon class='st4' points='139.2,28.1 181,28.1 129.1,6.9 	'/>
			<polygon class='st5' points='139.2,28.1 129.1,49.6 181,28.1 	'/>
		";
	}else if($result > 81.8){
		echo"
			<polygon class='st3' points='127.1,6.9 132.6,28.3 127.1,49.6 137.2,28.1 	'/>
			<polygon class='st4' points='137.2,28.1 179,28.1 127.1,6.9 	'/>
			<polygon class='st5' points='137.2,28.1 127.1,49.6 179,28.1 	'/>
		";
	}else if($result > 80.5){
		echo"
			<polygon class='st3' points='125.1,6.9 130.6,28.3 125.1,49.6 135.2,28.1 	'/>
			<polygon class='st4' points='135.2,28.1 177,28.1 125.1,6.9 	'/>
			<polygon class='st5' points='135.2,28.1 125.1,49.6 177,28.1 	'/>
		";
	}else if($result > 79.2){
		echo"
			<polygon class='st3' points='123.1,6.9 128.6,28.3 123.1,49.6 133.2,28.1 	'/>
			<polygon class='st4' points='133.2,28.1 175,28.1 123.1,6.9 	'/>
			<polygon class='st5' points='133.2,28.1 123.1,49.6 175,28.1 	'/>
		";
	}else if($result > 77.9){
		echo"
			<polygon class='st3' points='121.1,6.9 126.6,28.3 121.1,49.6 131.2,28.1 	'/>
			<polygon class='st4' points='131.2,28.1 173,28.1 121.1,6.9 	'/>
			<polygon class='st5' points='131.2,28.1 121.1,49.6 173,28.1 	'/>
		";
	}else if($result > 76.6){
		echo"
			<polygon class='st3' points='119.1,6.9 124.6,28.3 119.1,49.6 129.2,28.1 	'/>
			<polygon class='st4' points='129.2,28.1 171,28.1 119.1,6.9 	'/>
			<polygon class='st5' points='129.2,28.1 119.1,49.6 171,28.1 	'/>
		";
	}else if($result > 75.3){
		echo"
			<polygon class='st3' points='117.1,6.9 122.6,28.3 117.1,49.6 127.2,28.1 	'/>
			<polygon class='st4' points='127.2,28.1 169,28.1 117.1,6.9 	'/>
			<polygon class='st5' points='127.2,28.1 117.1,49.6 169,28.1 	'/>
		";
	}else if($result > 74){
		echo"
			<polygon class='st3' points='115.1,6.9 120.6,28.3 115.1,49.6 125.2,28.1 	'/>
			<polygon class='st4' points='125.2,28.1 167,28.1 115.1,6.9 	'/>
			<polygon class='st5' points='125.2,28.1 115.1,49.6 167,28.1 	'/>
		";
	}else if($result > 72.7){
		echo"
			<polygon class='st3' points='113.1,6.9 118.6,28.3 113.1,49.6 123.2,28.1 	'/>
			<polygon class='st4' points='123.2,28.1 165,28.1 113.1,6.9 	'/>
			<polygon class='st5' points='123.2,28.1 113.1,49.6 165,28.1 	'/>
		";
	}else if($result > 71.4){
		echo"
			<polygon class='st3' points='111.1,6.9 116.6,28.3 111.1,49.6 121.2,28.1 	'/>
			<polygon class='st4' points='121.2,28.1 163,28.1 111.1,6.9 	'/>
			<polygon class='st5' points='121.2,28.1 111.1,49.6 163,28.1 	'/>
		";	
	}else if($result > 70.1){
		echo"
			<polygon class='st3' points='109.1,6.9 114.6,28.3 109.1,49.6 119.2,28.1 	'/>
			<polygon class='st4' points='119.2,28.1 161,28.1 109.1,6.9 	'/>
			<polygon class='st5' points='119.2,28.1 109.1,49.6 161,28.1 	'/>
		";	
	}else if($result > 68.8){
		echo"
			<polygon class='st3' points='107.1,6.9 112.6,28.3 107.1,49.6 117.2,28.1 	'/>
			<polygon class='st4' points='117.2,28.1 159,28.1 107.1,6.9 	'/>
			<polygon class='st5' points='117.2,28.1 107.1,49.6 159,28.1 	'/>
		";	
	}else if($result > 67.5){
		echo"
			<polygon class='st3' points='105.1,6.9 110.6,28.3 105.1,49.6 115.2,28.1 	'/>
			<polygon class='st4' points='115.2,28.1 157,28.1 105.1,6.9 	'/>
			<polygon class='st5' points='115.2,28.1 105.1,49.6 157,28.1 	'/>
		";	
	}else if($result > 66.2){
		echo"
			<polygon class='st3' points='103.1,6.9 108.6,28.3 103.1,49.6 113.2,28.1 	'/>
			<polygon class='st4' points='113.2,28.1 155,28.1 103.1,6.9 	'/>
			<polygon class='st5' points='113.2,28.1 103.1,49.6 155,28.1 	'/>
		";	
	}else if($result > 64.9){
		echo"
			<polygon class='st3' points='101.1,6.9 106.6,28.3 101.1,49.6 111.2,28.1 	'/>
			<polygon class='st4' points='111.2,28.1 153,28.1 101.1,6.9 	'/>
			<polygon class='st5' points='111.2,28.1 101.1,49.6 153,28.1 	'/>
		";	
	}else if($result > 63.6){
		echo"
			<polygon class='st3' points='99.1,6.9 104.6,28.3 99.1,49.6 109.2,28.1 	'/>
			<polygon class='st4' points='109.2,28.1 151,28.1 99.1,6.9 	'/>
			<polygon class='st5' points='109.2,28.1 99.1,49.6 151,28.1 	'/>
		";	
	}else if($result > 62.3){
		echo"
			<polygon class='st3' points='97.1,6.9 102.6,28.3 97.1,49.6 107.2,28.1 	'/>
			<polygon class='st4' points='107.2,28.1 149,28.1 97.1,6.9 	'/>
			<polygon class='st5' points='107.2,28.1 97.1,49.6 149,28.1 	'/>
		";	
	}else if($result > 61){
		echo"
			<polygon class='st3' points='95.1,6.9 100.6,28.3 95.1,49.6 105.2,28.1 	'/>
			<polygon class='st4' points='105.2,28.1 147,28.1 95.1,6.9 	'/>
			<polygon class='st5' points='105.2,28.1 95.1,49.6 147,28.1 	'/>
		";	
	}else if($result > 59.7){
		echo"
			<polygon class='st3' points='93.1,6.9 98.6,28.3 93.1,49.6 103.2,28.1 	'/>
			<polygon class='st4' points='103.2,28.1 145,28.1 93.1,6.9 	'/>
			<polygon class='st5' points='103.2,28.1 93.1,49.6 145,28.1 	'/>
		";	
	}else if($result > 58.4){
		echo"
			<polygon class='st3' points='91.1,6.9 96.6,28.3 91.1,49.6 101.2,28.1 	'/>
			<polygon class='st4' points='101.2,28.1 143,28.1 91.1,6.9 	'/>
			<polygon class='st5' points='101.2,28.1 91.1,49.6 143,28.1 	'/>
		";		
	}else if($result > 57.1){
		echo"
			<polygon class='st3' points='89.1,6.9 94.6,28.3 89.1,49.6 99.2,28.1 	'/>
			<polygon class='st4' points='99.2,28.1 141,28.1 89.1,6.9 	'/>
			<polygon class='st5' points='99.2,28.1 89.1,49.6 141,28.1 	'/>
		";		
	}else if($result > 55.8){
		echo"
			<polygon class='st3' points='87.1,6.9 92.6,28.3 87.1,49.6 97.2,28.1 	'/>
			<polygon class='st4' points='97.2,28.1 139,28.1 87.1,6.9 	'/>
			<polygon class='st5' points='97.2,28.1 87.1,49.6 139,28.1 	'/>
		";		
	}else if($result > 54.5){
		echo"
			<polygon class='st3' points='85.1,6.9 90.6,28.3 85.1,49.6 95.2,28.1 	'/>
			<polygon class='st4' points='95.2,28.1 137,28.1 85.1,6.9 	'/>
			<polygon class='st5' points='95.2,28.1 85.1,49.6 137,28.1 	'/>
		";		
	}else if($result > 53.2){
		echo"
			<polygon class='st3' points='83.1,6.9 88.6,28.3 83.1,49.6 93.2,28.1 	'/>
			<polygon class='st4' points='93.2,28.1 135,28.1 83.1,6.9 	'/>
			<polygon class='st5' points='93.2,28.1 83.1,49.6 135,28.1 	'/>
		";		
	}else if($result > 51.9){
		echo"
			<polygon class='st3' points='81.1,6.9 86.6,28.3 81.1,49.6 91.2,28.1 	'/>
			<polygon class='st4' points='91.2,28.1 133,28.1 81.1,6.9 	'/>
			<polygon class='st5' points='91.2,28.1 81.1,49.6 133,28.1 	'/>
		";		
	}else if($result > 50.6){
		echo"
			<polygon class='st3' points='78.1,6.9 83.6,28.3 78.1,49.6 88.2,28.1 	'/>
			<polygon class='st4' points='88.2,28.1 130,28.1 78.1,6.9 	'/>
			<polygon class='st5' points='88.2,28.1 78.1,49.6 130,28.1 	'/>
		";		
	}else if($result > 49.3){
		echo"
			<polygon class='st3' points='76.1,6.9 81.6,28.3 76.1,49.6 86.2,28.1 	'/>
			<polygon class='st4' points='86.2,28.1 128,28.1 76.1,6.9 	'/>
			<polygon class='st5' points='86.2,28.1 76.1,49.6 128,28.1 	'/>
		";		
	}else if($result > 48){
		echo"
			<polygon class='st3' points='74.1,6.9 79.6,28.3 74.1,49.6 84.2,28.1 	'/>
			<polygon class='st4' points='84.2,28.1 126,28.1 74.1,6.9 	'/>
			<polygon class='st5' points='84.2,28.1 74.1,49.6 126,28.1 	'/>
		";		
	}else if($result > 46.7){
		echo"
			<polygon class='st3' points='72.1,6.9 77.6,28.3 72.1,49.6 82.2,28.1 	'/>
			<polygon class='st4' points='82.2,28.1 124,28.1 72.1,6.9 	'/>
			<polygon class='st5' points='82.2,28.1 72.1,49.6 124,28.1 	'/>
		";		
	}else if($result > 45.4){
		echo"
			<polygon class='st3' points='70.1,6.9 75.6,28.3 70.1,49.6 80.2,28.1 	'/>
			<polygon class='st4' points='80.2,28.1 122,28.1 70.1,6.9 	'/>
			<polygon class='st5' points='80.2,28.1 70.1,49.6 122,28.1 	'/>
		";		
	}else if($result > 44.1){
		echo"
			<polygon class='st3' points='68.1,6.9 73.6,28.3 68.1,49.6 78.2,28.1 	'/>
			<polygon class='st4' points='78.2,28.1 120,28.1 68.1,6.9 	'/>
			<polygon class='st5' points='78.2,28.1 68.1,49.6 120,28.1 	'/>
		";		
	}else if($result > 42.8){
		echo"
			<polygon class='st3' points='66.1,6.9 71.6,28.3 66.1,49.6 76.2,28.1 	'/>
			<polygon class='st4' points='76.2,28.1 118,28.1 66.1,6.9 	'/>
			<polygon class='st5' points='76.2,28.1 66.1,49.6 118,28.1 	'/>
		";		
	}else if($result > 41.5){
		echo"
			<polygon class='st3' points='64.1,6.9 69.6,28.3 64.1,49.6 74.2,28.1 	'/>
			<polygon class='st4' points='74.2,28.1 116,28.1 64.1,6.9 	'/>
			<polygon class='st5' points='74.2,28.1 64.1,49.6 116,28.1 	'/>
		";		
	}else if($result > 40.2){
		echo"
			<polygon class='st3' points='62.1,6.9 67.6,28.3 62.1,49.6 72.2,28.1 	'/>
			<polygon class='st4' points='72.2,28.1 114,28.1 62.1,6.9 	'/>
			<polygon class='st5' points='72.2,28.1 62.1,49.6 114,28.1 	'/>
		";		
	}else if($result > 38.9){
		echo"
			<polygon class='st3' points='60.1,6.9 65.6,28.3 60.1,49.6 70.2,28.1 	'/>
			<polygon class='st4' points='70.2,28.1 112,28.1 60.1,6.9 	'/>
			<polygon class='st5' points='70.2,28.1 60.1,49.6 112,28.1 	'/>
		";		
	}else if($result > 37.6){
		echo"
			<polygon class='st3' points='58.1,6.9 63.6,28.3 58.1,49.6 68.2,28.1 	'/>
			<polygon class='st4' points='68.2,28.1 110,28.1 58.1,6.9 	'/>
			<polygon class='st5' points='68.2,28.1 58.1,49.6 110,28.1 	'/>
		";		
	}else if($result > 36.3){
		echo"
			<polygon class='st3' points='56.1,6.9 61.6,28.3 56.1,49.6 66.2,28.1 	'/>
			<polygon class='st4' points='66.2,28.1 108,28.1 56.1,6.9 	'/>
			<polygon class='st5' points='66.2,28.1 56.1,49.6 108,28.1 	'/>
		";		
	}else if($result > 35){
		echo"
			<polygon class='st3' points='54.1,6.9 59.6,28.3 54.1,49.6 64.2,28.1 	'/>
			<polygon class='st4' points='64.2,28.1 106,28.1 54.1,6.9 	'/>
			<polygon class='st5' points='64.2,28.1 54.1,49.6 106,28.1 	'/>
		";		
	}else if($result > 33.7){
		echo"
			<polygon class='st3' points='52.1,6.9 57.6,28.3 52.1,49.6 62.2,28.1 	'/>
			<polygon class='st4' points='62.2,28.1 104,28.1 52.1,6.9 	'/>
			<polygon class='st5' points='62.2,28.1 52.1,49.6 104,28.1 	'/>
		";		
	}else if($result > 32.4){
		echo"
			<polygon class='st3' points='50.1,6.9 55.6,28.3 50.1,49.6 60.2,28.1 	'/>
			<polygon class='st4' points='60.2,28.1 102,28.1 50.1,6.9 	'/>
			<polygon class='st5' points='60.2,28.1 50.1,49.6 102,28.1 	'/>
		";		
	}else if($result > 31.1){
		echo"
			<polygon class='st3' points='48.1,6.9 53.6,28.3 48.1,49.6 58.2,28.1 	'/>
			<polygon class='st4' points='58.2,28.1 100,28.1 48.1,6.9 	'/>
			<polygon class='st5' points='58.2,28.1 48.1,49.6 100,28.1 	'/>
		";		
	}else if($result > 29.8){
		echo"
			<polygon class='st3' points='46.1,6.9 51.6,28.3 46.1,49.6 56.2,28.1 	'/>
			<polygon class='st4' points='56.2,28.1 98,28.1 46.1,6.9 	'/>
			<polygon class='st5' points='56.2,28.1 46.1,49.6 98,28.1 	'/>
		";		
	}else if($result > 28.5){
		echo"
			<polygon class='st3' points='44.1,6.9 49.6,28.3 44.1,49.6 54.2,28.1 	'/>
			<polygon class='st4' points='54.2,28.1 96,28.1 44.1,6.9 	'/>
			<polygon class='st5' points='54.2,28.1 44.1,49.6 96,28.1 	'/>
		";		
	}else if($result > 27.2){
		echo"
			<polygon class='st3' points='42.1,6.9 47.6,28.3 42.1,49.6 52.2,28.1 	'/>
			<polygon class='st4' points='52.2,28.1 94,28.1 42.1,6.9 	'/>
			<polygon class='st5' points='52.2,28.1 42.1,49.6 94,28.1 	'/>
		";		
	}else if($result > 25.9){
		echo"
			<polygon class='st3' points='40.1,6.9 45.6,28.3 40.1,49.6 50.2,28.1 	'/>
			<polygon class='st4' points='50.2,28.1 92,28.1 40.1,6.9 	'/>
			<polygon class='st5' points='50.2,28.1 40.1,49.6 92,28.1 	'/>
		";		
	}else if($result > 24.6){
		echo"
			<polygon class='st3' points='38.1,6.9 43.6,28.3 38.1,49.6 48.2,28.1 	'/>
			<polygon class='st4' points='48.2,28.1 90,28.1 38.1,6.9 	'/>
			<polygon class='st5' points='48.2,28.1 38.1,49.6 90,28.1 	'/>
		";		
	}else if($result > 23.3){
		echo"
			<polygon class='st3' points='36.1,6.9 41.6,28.3 36.1,49.6 46.2,28.1 	'/>
			<polygon class='st4' points='46.2,28.1 88,28.1 36.1,6.9 	'/>
			<polygon class='st5' points='46.2,28.1 36.1,49.6 88,28.1 	'/>
		";		
	}else if($result > 22){
		echo"
			<polygon class='st3' points='34.1,6.9 39.6,28.3 34.1,49.6 44.2,28.1 	'/>
			<polygon class='st4' points='44.2,28.1 86,28.1 34.1,6.9 	'/>
			<polygon class='st5' points='44.2,28.1 34.1,49.6 86,28.1 	'/>
		";		
	}else if($result > 20.7){
		echo"
			<polygon class='st3' points='32.1,6.9 37.6,28.3 32.1,49.6 42.2,28.1 	'/>
			<polygon class='st4' points='42.2,28.1 84,28.1 32.1,6.9 	'/>
			<polygon class='st5' points='42.2,28.1 32.1,49.6 84,28.1 	'/>
		";		
	}else if($result > 19.4){
		echo"
			<polygon class='st3' points='30.1,6.9 35.6,28.3 30.1,49.6 40.2,28.1 	'/>
			<polygon class='st4' points='40.2,28.1 82,28.1 30.1,6.9 	'/>
			<polygon class='st5' points='40.2,28.1 30.1,49.6 82,28.1 	'/>
		";		
	}else if($result > 18.1){
		echo"
			<polygon class='st3' points='28.1,6.9 33.6,28.3 28.1,49.6 38.2,28.1 	'/>
			<polygon class='st4' points='38.2,28.1 80,28.1 28.1,6.9 	'/>
			<polygon class='st5' points='38.2,28.1 28.1,49.6 80,28.1 	'/>
		";		
	}else if($result > 16.8){
		echo"
			<polygon class='st3' points='26.1,6.9 31.6,28.3 26.1,49.6 36.2,28.1 	'/>
			<polygon class='st4' points='36.2,28.1 78,28.1 26.1,6.9 	'/>
			<polygon class='st5' points='36.2,28.1 26.1,49.6 78,28.1 	'/>
		";		
	}else if($result > 15.5){
		echo"
			<polygon class='st3' points='24.1,6.9 29.6,28.3 24.1,49.6 34.2,28.1 	'/>
			<polygon class='st4' points='34.2,28.1 76,28.1 24.1,6.9 	'/>
			<polygon class='st5' points='34.2,28.1 24.1,49.6 76,28.1 	'/>
		";		
	}else if($result > 14.2){
		echo"
			<polygon class='st3' points='22.1,6.9 27.6,28.3 22.1,49.6 32.2,28.1 	'/>
			<polygon class='st4' points='32.2,28.1 74,28.1 22.1,6.9 	'/>
			<polygon class='st5' points='32.2,28.1 22.1,49.6 74,28.1 	'/>
		";		
	}else if($result > 12.9){
		echo"
			<polygon class='st3' points='20.1,6.9 25.6,28.3 20.1,49.6 30.2,28.1 	'/>
			<polygon class='st4' points='30.2,28.1 72,28.1 20.1,6.9 	'/>
			<polygon class='st5' points='30.2,28.1 20.1,49.6 72,28.1 	'/>
		";		
	}else if($result > 11.6){
		echo"
			<polygon class='st3' points='18.1,6.9 23.6,28.3 18.1,49.6 28.2,28.1 	'/>
			<polygon class='st4' points='28.2,28.1 70,28.1 18.1,6.9 	'/>
			<polygon class='st5' points='28.2,28.1 18.1,49.6 70,28.1 	'/>
		";		
	}else if($result > 10.3){
		echo"
			<polygon class='st3' points='16.1,6.9 21.6,28.3 16.1,49.6 26.2,28.1 	'/>
			<polygon class='st4' points='26.2,28.1 68,28.1 16.1,6.9 	'/>
			<polygon class='st5' points='26.2,28.1 16.1,49.6 68,28.1 	'/>
		";		
	}else if($result > 9){
		echo"
			<polygon class='st3' points='14.1,6.9 19.6,28.3 14.1,49.6 24.2,28.1 	'/>
			<polygon class='st4' points='24.2,28.1 66,28.1 14.1,6.9 	'/>
			<polygon class='st5' points='24.2,28.1 14.1,49.6 66,28.1 	'/>
		";		
	}else if($result > 7.7){
		echo"
			<polygon class='st3' points='12.1,6.9 17.6,28.3 12.1,49.6 22.2,28.1 	'/>
			<polygon class='st4' points='22.2,28.1 64,28.1 12.1,6.9 	'/>
			<polygon class='st5' points='22.2,28.1 12.1,49.6 64,28.1 	'/>
		";		
	}else if($result > 6.4){
		echo"
			<polygon class='st3' points='10.1,6.9 15.6,28.3 10.1,49.6 20.2,28.1 	'/>
			<polygon class='st4' points='20.2,28.1 62,28.1 10.1,6.9 	'/>
			<polygon class='st5' points='20.2,28.1 10.1,49.6 62,28.1 	'/>
		";		
	}else if($result > 5.1){
		echo"
			<polygon class='st3' points='8.1,6.9 13.6,28.3 8.1,49.6 18.2,28.1 	'/>
			<polygon class='st4' points='18.2,28.1 60,28.1 8.1,6.9 	'/>
			<polygon class='st5' points='18.2,28.1 8.1,49.6 60,28.1 	'/>
		";		
	}else if($result > 3.8){
		echo"
			<polygon class='st3' points='6.1,6.9 11.6,28.3 6.1,49.6 16.2,28.1 	'/>
			<polygon class='st4' points='16.2,28.1 58,28.1 6.1,6.9 	'/>
			<polygon class='st5' points='16.2,28.1 6.1,49.6 58,28.1 	'/>
		";		
	}else if($result > 2.5){
		echo"
			<polygon class='st3' points='4.1,6.9 9.6,28.3 4.1,49.6 14.2,28.1 	'/>
			<polygon class='st4' points='14.2,28.1 56,28.1 4.1,6.9 	'/>
			<polygon class='st5' points='14.2,28.1 4.1,49.6 56,28.1 	'/>
		";		
	}else if($result > 1.3){
		echo"
			<polygon class='st3' points='2.1,6.9 7.6,28.3 2.1,49.6 12.2,28.1 	'/>
			<polygon class='st4' points='12.2,28.1 54,28.1 2.1,6.9 	'/>
			<polygon class='st5' points='12.2,28.1 2.1,49.6 54,28.1 	'/>
		";		
	}else if($result > 0){
		echo"
			<polygon class='st3' points='0,6.9 5.5,28.3 0,49.6 10.1,28.1 	'/>
			<polygon class='st4' points='10.1,28.1 51.9,28.1 0,6.9 	'/>
			<polygon class='st5' points='10.1,28.1 0,49.6 51.9,28.1 	'/>	
		";
	}	
?>




