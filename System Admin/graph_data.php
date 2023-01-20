<?php
include 'connection_database.php';
	if(isset($_POST['req'])){
		if($_POST['req'] == "all"){
			$sql_query = "SELECT * FROM `information` WHERE `Status` = 'Activated';";
			$query_res = mysqli_query($conn,$sql_query);
			echo mysqli_num_rows($query_res);
		}else if($_POST['req'] == "male"){
			$sql_query = "SELECT * FROM `information` WHERE `Gender` = 'Male' AND `Status` = 'Activated';";
			$query_res = mysqli_query($conn,$sql_query);
			echo mysqli_num_rows($query_res);
		}else if($_POST['req'] == "female"){
			$sql_query = "SELECT * FROM `information` WHERE `Gender` = 'Female' AND `Status` = 'Activated';";
			$query_res = mysqli_query($conn,$sql_query);
			echo mysqli_num_rows($query_res);
		}else if($_POST['req'] == "bar"){
				$sql_query = "SELECT * FROM `information` WHERE `Status` = 'Activated'";
				$query_res = mysqli_query($conn,$sql_query);
				//echo mysqli_num_rows($query_res);
				$data = array();
				foreach($query_res as $row ){
					$data[] = $row;
				}
			echo json_encode($data);
		}else if($_POST['req'] == "pie"){
			//checking the if the account is activated
			$sql_query = "SELECT * FROM `accounts` WHERE `value` = 'Activated' AND `Usertype` = 'Student';";
			$resul_of_search = mysqli_query($conn,$sql_query);
			$data = array();
			$_SESSION['chk_3'] = '0';
			foreach($resul_of_search as $search){
				$sql_query = "SELECT * FROM `student_status` WHERE `Id` = '".$search['Id']."' ORDER BY `sequence` DESC";
				$query_res = mysqli_query($conn,$sql_query);
				//echo mysqli_num_rows($query_res);
				
				foreach($query_res as $row ){
					if($_SESSION['chk_3'] != $row['id']){
						$_SESSION['chk_3'] = $row['id'];
						$data[] = $row;
					}
				}
			}
		
			echo json_encode($data);
		}else if($_POST['req'] == "line"){
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
								$sql_query = "SELECT * FROM `information` WHERE `id` = '".$row['id']."' AND `Status` = 'Activated' ;";
								$res = mysqli_query($conn,$sql_query);
								//echo mysqli_num_rows($query_res);
								$sql_query1 = "SELECT `id`,`date_time` FROM `assessment_records` WHERE `id` = '".$row['id']."' AND `Date` BETWEEN '".$_POST['min']."' AND '".$_POST['max']."';";
								$res2 = mysqli_query($conn,$sql_query1);
								foreach($res as $row2){
										foreach($res2 as $row3){
											if($_SESSION['chk_2'] != $row3['id']){
												$_SESSION['chk_2'] = $row3['id'];
												$data[] = array_merge($row,$row2,$row3);
											}
										}
								}
						}
			}
			echo json_encode($data);
		}else if($_POST['req'] == "add_rec"){
			//for adding mental health topic recommendation
			//make an button to edit recommendation
			$sql_q = "";
			if($_POST['topic'] == "Stress"){
				if($_POST['scale'] == "average"){
					$sql_q = "INSERT INTO `recommendation_stress`(`councilor_id`, `stress_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				
				}else if($_POST['scale'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_stress`(`councilor_id`, `stress_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_stress`(`councilor_id`, `stress_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}
				
				$result = mysqli_query($conn,$sql_q);
					echo "Success";
			}else if($_POST['topic'] == "Anxiety"){
				if($_POST['scale'] == "average"){
					$sql_q = "INSERT INTO `recommendation_anxiety`(`councilor_id`, `anxiety_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
					
				}else if($_POST['scale'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_anxiety`(`councilor_id`, `anxiety_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_anxiety`(`councilor_id`, `anxiety_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}
				$result = mysqli_query($conn,$sql_q);
				echo "Success";
			}else if($_POST['topic'] == "Depression"){
				if($_POST['scale'] == "average"){
					$sql_q = "INSERT INTO `recommendation_depression`(`councilor_id`, `depression_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}else if($_POST['scale'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_depression`(`councilor_id`, `depression_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_depression`(`councilor_id`, `depression_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}
				$result = mysqli_query($conn,$sql_q);
				echo "Success";
				
			}else if($_POST['topic'] == "Sleep Disorder"){
				if($_POST['scale'] == "average"){
					$sql_q = "INSERT INTO `recommendation_sleep_disorder`(`councilor_id`, `sleep_disorder_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}else if($_POST['scale'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_sleep_disorder`(`councilor_id`, `sleep_disorder_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_sleep_disorder`(`councilor_id`, `sleep_disorder_rec`,`mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$_POST['scale']."');";
				}
				
				$result = mysqli_query($conn,$sql_q);
				echo "Success";
			}
			
		}
		
	}else{
		echo "error";
	}
	
?>