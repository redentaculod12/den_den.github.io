<?php
	include 'connection_database.php';
	$data = '';
	$header = '';
	$_SESSION['topic'] = '';
	if(isset($_POST['request'])){
		$sql = 'SELECT * FROM information WHERE Id = "'.$_POST['request'].'"; ';
		//this is for use of query
		$result = mysqli_query($conn,$sql);
		//to reload all the row 
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
	
	if(isset($_POST["request_table"])){
		//create an query for table
		if(isset($_POST['topic'])){
			if($_POST['topic'] == "Stress"){
				$_SESSION['topic'] = 'stress';
			}else if($_POST['topic'] == "Anxiety"){
				$_SESSION['topic'] = 'anxiety';
			}else if($_POST['topic'] == "Depression"){
				$_SESSION['topic'] = 'depression';
			}else{
				$_SESSION['topic'] = 'sleep_disorder';
			}
		}
		//make an query for assessment record to check the status of student
		$sql_query = "SELECT * FROM `student_status` WHERE ".$_SESSION['topic']." = '".$_POST['stats']."';";
		
		$_SESSION['chk_1'] =  '0';
		$query_res = mysqli_query($conn,$sql_query);
		if(mysqli_num_rows($query_res) > 0){
			foreach($query_res as $row){
				//create an querry for data of student by id 
				if($_SESSION['chk_1'] != $row['id']){
					$_SESSION['chk_1'] = $row['id'];
					$query_st = "SELECT * FROM `information` WHERE `Id` ='".$row['id']."' AND `councilor_id`='".$_SESSION['id']."' ;";
					$sql_res  = mysqli_query($conn,$query_st);
					$items = mysqli_fetch_array($sql_res);
					
						$data .= 
							"<tr>".
								"<td data-label='ID'>".$items['Id_number']."</td>".
								"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
								"<td data-label='Gender'>".$items['Gender']."</td>".
								"<td data-label='Course'>".$items['Management']."</td>".
								"<td data-label='Year'>".$items['Section']."</td>".
								"<td data-label='Action'>".
									"<div><input id='view-accounts' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>".
								"</td>".
							"</tr><tr class='sep'></tr>";
				}
				
			}
		}else{
			$data .= 
				"<tr ><td class='table_' style='border:none;position: relative;
					top: 50px;' rowspan='3'  colspan='7'>No Record Found</td></tr>";
		}
		
		$header =  "<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Gender</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
		echo $header.$data;
	}
	
?>