<?php 
	include 'connection_database.php';
	if(isset($_POST['req'])){
		$data = '';
		$def = '<tr>
					<th>Items</th>
					<th>Recommendation</th>
					<th>Action</th>
				</tr>';
		$count = 0;
		if($_POST['topic'] == "Stress"){
			if($_POST['scale'] == "average"){
				$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['stress_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
				
			}else if($_POST['scale'] == "moderate"){
				$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['stress_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else{
				$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['stress_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}
		}else if($_POST['topic'] == "Depression"){
			if($_POST['scale'] == "average"){
				$sql_query = "SELECT * FROM `recommendation_depression` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['depression_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else if($_POST['scale'] == "moderate"){
				$sql_query = "SELECT * FROM `recommendation_depression` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['depression_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else{
				$sql_query = "SELECT * FROM `recommendation_depression` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['depression_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}
		}else if($_POST['topic'] == "Anxiety"){
			if($_POST['scale'] == "average"){
				$sql_query = "SELECT * FROM `recommendation_anxiety` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['anxiety_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else if($_POST['scale'] == "moderate"){
				$sql_query = "SELECT * FROM `recommendation_anxiety` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['anxiety_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else{
				$sql_query = "SELECT * FROM `recommendation_anxiety` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['anxiety_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}
		}else{
			if($_POST['scale'] == "average"){
				$sql_query = "SELECT * FROM `recommendation_sleep_disorder` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['sleep_disorder_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else if($_POST['scale'] == "moderate"){
				$sql_query = "SELECT * FROM `recommendation_sleep_disorder` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['sleep_disorder_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}else{
				$sql_query = "SELECT * FROM `recommendation_sleep_disorder` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe';";
				$resul_of_search = mysqli_query($conn,$sql_query);
				foreach($resul_of_search as $row){
					$count += 1;
					$data .= "<tr>
								<td>".$count."</td>
								<td id='question_1'>".$row['sleep_disorder_rec']."</td>
								<td>
									<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].")'>
									<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].")'>
								</td>
							</tr>";
				}
				echo $def.$data;
			}
			
		
		}
		/*//checking the if the account is activated
		$sql_query = "SELECT * FROM `accounts` WHERE `value` = 'Activated'  AND `Usertype` = 'Student';";
		$resul_of_search = mysqli_query($conn,$sql_query);
		$data = array();
		$_SESSION['chk_2'] = '0';
		foreach($resul_of_search as $search){
			$sql_query = "SELECT * FROM `student_status` WHERE Id = '".$search['Id']."' ORDER BY `sequence` DESC;";
			$query_res = mysqli_query($conn,$sql_query);
			//echo mysqli_num_rows($query_res);
			foreach($query_res as $row ){
				if($_SESSION['chk_2'] != $row['id']){
					$_SESSION['chk_2'] = $row['id'];
					$data[] = $row;
				}
			}
		}
		echo json_encode($data);*/
	}
?>