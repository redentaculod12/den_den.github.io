<?php
	include 'connection_database.php';
		if($_POST['request'] == 'conversation'){		
			$sql = "SELECT COUNT(*) FROM conversation WHERE receiver_id = 1 AND id = ".$_SESSION['id']." OR receiver_id = ".$_SESSION['id']." AND id = 1;";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			echo json_decode($row[0]);
		}else{
			$sql = "SELECT COUNT(*) FROM invitation_message WHERE id = ".$_SESSION['id'].";";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			echo json_decode($row[0]);
		}
		
?>