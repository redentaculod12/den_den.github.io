<?php
include 'connection_database.php';
		//this is for the name of student request
		
			$sql = "SELECT * FROM information WHERE id = '".$_POST['receiver_id']."';";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			
			echo ($row['First_name'].' '.substr($row['Middle_name'],0,1).'. '.$row['Last_name']);
		

?>