<?php 
	include 'connection_database.php';
	if(isset($_POST['req'])){
		if($_POST['req'] == 'history'){
			$sql_query = "SELECT * FROM `assessment_records` WHERE id = '".$_SESSION['id']."' ORDER BY `sequence` ASC;";
			$query_res = mysqli_query($conn,$sql_query);
			$data = array();
			foreach($query_res as $search){
				if($_POST['topics'] == "Stress"){
					$data[] = [$search['date_time'],$search['stress'],$search['s_overall']];
				}else if($_POST['topics'] == "Anxiety"){
					$data[] = [$search['date_time'],$search['anxiety'],$search['a_all']];
				}else if($_POST['topics'] == "depression"){
					$data[] = [$search['date_time'],$search['depression'],$search['d_all']];
				}else{
					$data[] = [$search['date_time'],$search['sleep_disorder'],$search['sd_all']];
				}
					
			}
			echo json_encode($data);
		}
		
	}else{
		
	}
		
			
?>