<?php	
include "connection_database.php";
if(isset($_POST['email_created'])){
		$_SESSION['email_created'] = $_POST['email_created'];
		$_SESSION['add_first_name'] = $_POST['add_first_name'];
		$_SESSION['add_last_name'] = $_POST['add_last_name'];
		$_SESSION['add_middle_name'] = $_POST['add_middle_name'];
		$_SESSION['add_gender'] = $_POST['add_gender'];
		$_SESSION['add_birthday'] = $_POST['add_birthday'];
		$_SESSION['add_birth_place'] = $_POST['add_birth_place'];
		$_SESSION['add_id_number'] = $_POST['add_id_number'];
		$_SESSION['add_management'] = $_POST['add_management'];
		//$_SESSION['add_section'] = $_POST['add_section'];
		$_SESSION['add_password'] = $_POST['add_password'];
	}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['account_user']) && $_POST['account_user'] == "Admin"){
	//make osas head account for approve of account in admin request acc
	//check if the data is not null 
	if(isset($_POST['email_created'])){
		$_SESSION['email_created'] = $_POST['email_created'];
		$_SESSION['add_first_name'] = $_POST['add_first_name'];
		$_SESSION['add_last_name'] = $_POST['add_last_name'];
		$_SESSION['add_middle_name'] = $_POST['add_middle_name'];
		$_SESSION['add_gender'] = $_POST['add_gender'];
		$_SESSION['add_birthday'] = $_POST['add_birthday'];
		$_SESSION['add_birth_place'] = $_POST['add_birth_place'];
		$_SESSION['add_id_number'] = $_POST['add_id_number'];
		$_SESSION['add_management'] = $_POST['add_management'];
		//$_SESSION['add_section'] = $_POST['add_section'];
		$_SESSION['add_password'] = $_POST['add_password'];
	
	}
		
	if(isset($_POST['email_created']) && isset($_POST['add_password'])){
		if(strlen($_SESSION['add_password']) < 15 && strlen($_SESSION['add_password']) > 7){
			
			//make an counter redundunt acc
			$check_red = "SELECT * FROM `accounts` WHERE `Email` = '".$_SESSION['email_created']."';";
			$res_req = mysqli_query($conn,$check_red);
			$check_red_acc = "SELECT * FROM `accounts_pending` WHERE `Email` = '".$_SESSION['email_created']."';";
			$res_req_acc= mysqli_query($conn,$check_red_acc);
			if(mysqli_num_rows($res_req) > 0 ||  mysqli_num_rows($res_req_acc) > 0){
				header("location: signup.php?attemp=existed");
			}else{
				//query that will add the new user/Student account
				$password1	= sha1($conn->real_escape_string($_SESSION['add_password']));
				$sql = "INSERT INTO `accounts_pending`(`Id`, `Email`, `Password`, `Usertype`,`value`) VALUES (NUll,'".$_SESSION['email_created']."','".$password1."','Admin','Activated');";
				$result =  mysqli_query($conn,$sql);
				
				//get the current id of account
				$sql_id_req = "SELECT * FROM accounts_pending WHERE Email = '".$_SESSION['email_created']."';";
				$result_req = mysqli_query($conn,$sql_id_req);
				$row_ = mysqli_num_rows($result_req);
				
				$row = mysqli_fetch_assoc($result_req);
				//insert information of new account
				$sql_info = "INSERT INTO `information_pending`(`First_name`, `Last_name`, `Middle_name`, `Gender`, `Birthday`, `Birthplace`, `Id_number`, `Management`,`Status`, `Id`)VALUES ('".$_SESSION['add_first_name']."','".$_SESSION['add_last_name']."','".$_SESSION['add_middle_name']."','".$_SESSION['add_gender']."','".$_SESSION['add_birthday']."','".$_SESSION['add_birth_place']."','".$_SESSION['add_id_number']."','".$_SESSION['add_management']."','None','".$row['Id']."');";//None means for online or not online
				$result_req_info = mysqli_query($conn,$sql_info);
				//make an ajax request and put an alert dialog that says it successful
				//echo '<script> alert("Your Request have been send wait for approval"); </script>';
				header("location: index.php?attemp = sucess");
			}
		}else{
				header("location:signup.php?attemp=short");
		}

	}else{
	
	}
}else{
	
	if(isset($_POST['email_created'])){
		$_SESSION['email_created'] = $_POST['email_created'];
		$_SESSION['add_first_name'] = $_POST['add_first_name'];
		$_SESSION['add_last_name'] = $_POST['add_last_name'];
		$_SESSION['add_middle_name'] = $_POST['add_middle_name'];
		$_SESSION['add_gender'] = $_POST['add_gender'];
		$_SESSION['add_birthday'] = $_POST['add_birthday'];
		$_SESSION['add_birth_place'] = $_POST['add_birth_place'];
		$_SESSION['add_id_number'] = $_POST['add_id_number'];
		$_SESSION['add_management'] = $_POST['add_management'];
		$_SESSION['add_section'] = $_POST['add_section'];
		$_SESSION['add_password'] = $_POST['add_password'];
	}


	if(isset($_POST['email_created']) && isset($_POST['add_password'])){
		if(strlen($_SESSION['add_password']) < 15 && strlen($_SESSION['add_password']) > 7){
			if(isset($_POST['email_created'])){
				$_SESSION['email_created'] = $_POST['email_created'];
				$_SESSION['add_first_name'] = $_POST['add_first_name'];
				$_SESSION['add_last_name'] = $_POST['add_last_name'];
				$_SESSION['add_middle_name'] = $_POST['add_middle_name'];
				$_SESSION['add_gender'] = $_POST['add_gender'];
				$_SESSION['add_birthday'] = $_POST['add_birthday'];
				$_SESSION['add_birth_place'] = $_POST['add_birth_place'];
				$_SESSION['add_id_number'] = $_POST['add_id_number'];
				$_SESSION['add_management'] = $_POST['add_management'];
				$_SESSION['add_section'] = $_POST['add_section'];
				$_SESSION['add_password'] = $_POST['add_password'];
	        }


				$mail = new PHPMailer(true);

				try {
				 
					$otp = rand(100000,999999);     
					$_SESSION['otp'] = $otp;
					$mail->isSMTP();     					
					$mail->Host       = 'smtp.gmail.com';                     
					$mail->SMTPAuth   = true;          
					//make and validate google account for email transfer
					$mail->Username   = 'reden.taculod@citycollegeoftagaytay.edu.ph';                    
					$mail->Password   = 'womatcqhnhydrnzm';                             
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
					$mail->Port       = 465;                                    

				  
					$mail->setFrom('reden.taculod@citycollegeoftagaytay.edu.ph', 'OTP CODE');

					//$mail->addAddress('angel.loisaga@citycollegeoftagaytay.edu.ph');   
					$email_ac = "";
					$email_ac .= $_SESSION['email_created'];
					$mail->addAddress($email_ac); 

					$mail->isHTML(true);                                 
					$mail->Subject = 'CCT_MHMS';
					$mail->Body    = '<b>VERIFICATION CODE: '.$otp.'<b>';

					$mail->send();
					echo '<script> alert("The OTP CODE has been sent to your email"); </script>';
				} catch (Exception $e) {
					echo '<script> alert("enter correct email or check your connection"); </script>';
					header("location: signup.php?attemp=email");
				}
			
		}else{
		    header("location:signup.php?attemp=short");
		}
	}else{
		echo '<script>alert("not");</script>';
	}
?>
<html>
<link rel="stylesheet" href="assets/css/style.css">
<div class="insert_table" id="add-account">
	<form class="insert-form" onsubmit="signupcon.php" method="GET">
		<div class= "information_table">
			<div>
				<label for="Confirmition">OTP CODE</label>
				<input id="Confirmition" class='' type="text" name="Confirmation" required>
			</div>
			<div>
				<input id="submit-data"  type='submit' value='Submit'>
			</div>
		</div>
	</form>
</div>
	
</html>
<?php 
	if(isset($_GET['Confirmation'])){
		
		if($_SESSION['otp'] == $_GET['Confirmation']){
			//check if the data is not null 
			if(isset($_SESSION['email_created']) && isset($_SESSION['add_password'])){
				//make an counter redundunt acc
				$check_red = "SELECT * FROM `accounts` WHERE `Email` = '".$_SESSION['email_created']."';";
				$res_req = mysqli_query($conn,$check_red);
				if(mysqli_num_rows($res_req) > 0){
					header("location: signup.php?attemp=existed");
				}else{
					$password1	= sha1($conn->real_escape_string($_SESSION['add_password']));
					//query that will add the new user/Student account
					$sql = "INSERT INTO `accounts`(`Id`, `Email`, `Password`, `Usertype`,`value`) VALUES (NUll,'".$_SESSION['email_created']."','".$password1."','Student','Activated');";
					$result =  mysqli_query($conn,$sql);
					//get the current id of account
					$sql_id_req = "SELECT * FROM accounts WHERE Email = '".$_SESSION['email_created']."';";
					$result_req = mysqli_query($conn,$sql_id_req);
					$row_ = mysqli_num_rows($result_req);
					$row = mysqli_fetch_assoc($result_req);
					//get and set the councilor id will assesst and monitor the student
					$sql_cid_req = $sql_id_req = "SELECT * FROM accounts WHERE Usertype = 'System Admin';";
					$result_id = mysqli_query($conn,$sql_cid_req);
					$rand_id = array();
					foreach($result_id as $id_councilor){
						array_push($rand_id,$id_councilor['Id']);
					}
					//this will set randomly councilor
					$c_id = rand(0,count($rand_id));
					//insert information of new account
					$sql_info = "INSERT INTO `information`(`First_name`, `Last_name`, `Middle_name`, `Gender`, `Birthday`, `Birthplace`, `Id_number`, `Management`, `Section`,`Status`, `Id`,`councilor_id`)VALUES ('".$_SESSION['add_first_name']."','".$_SESSION['add_last_name']."','".$_SESSION['add_middle_name']."','".$_SESSION['add_gender']."','".$_SESSION['add_birthday']."','".$_SESSION['add_birth_place']."','".$_SESSION['add_id_number']."','".$_SESSION['add_management']."','".$_SESSION['add_section']."','None','".$row['Id']."','".$c_id."');";
					$result_req_info = mysqli_query($conn,$sql_info);
					
					//make an ajax request and put an alert dialog that says it successful
					header("location: index.php?attemp=sucess");
				}
			}else{
				
			}
		}else{
			echo "<script> alert('incorect code'); </script>";
		}
	}
}

	
?>