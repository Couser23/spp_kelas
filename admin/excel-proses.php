<?php
	if(isset($_POST['input'])){

		$datanama  =  $_FILES['data']['name'];
		$datatmp   =  $_FILES['data']['tmp_name'];	
		$exe       =  pathinfo($datanama, PATHINFO_EXTENSION);
		$folder    = 'excel/';
         
		if($exe=='csv'){
			$upload = move_uploaded_file($datatmp, $folder.$datanama);
			if($upload){
				$open = fopen($folder.$datanama, 'r');
				while (($row = fgetcsv($open, 1000, ','))!==FALSE ) {
					    $sql = mysqli_query("INSERT INTO siswa 
					    VALUES('','".$row[0]."','".$row[1]."','".$row[2]."') ")or die(mysqli_error());

				}

			}else{
				echo "Gagal diupload";
			}
		}else{
			echo "Bukan File CSV";
		}

	}
?>