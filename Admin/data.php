<?php
	include 'connection_database.php';
	$sql = 'SELECT * FROM information WHERE Id = "'.$_SESSION['id'].'"; ';
		//this is for use of query
		$result = mysqli_query($conn,$sql);
		//to reload all the row 
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
?>