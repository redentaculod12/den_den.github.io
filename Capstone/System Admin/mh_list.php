<?php 
	include 'connection_database.php';
	if(isset($_POST['door'])){
		//checking the if the account is activated
		$sql_query = "SELECT * FROM `accounts` WHERE `value` = 'Activated'  AND `Usertype` = 'Student';";
		$resul_of_search = mysqli_query($conn,$sql_query);
		$data = array();
		$_SESSION['chk_2'] = '0';
		foreach($resul_of_search as $search){
			$sql_query = "SELECT * FROM `student_status` WHERE id = '".$search['Id']."' ORDER BY `sequence` DESC;";
			$query_res = mysqli_query($conn,$sql_query);
			//echo mysqli_num_rows($query_res);
			foreach($query_res as $row ){
				if($_SESSION['chk_2'] != $row['id']){
					$_SESSION['chk_2'] = $row['id'];
					$data[] = $row;
				}
			}
		}
		echo json_encode($data);
	}
?>