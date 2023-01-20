<?php
	include 'connection_database.php';
		$sql = "SELECT * FROM personal_conversation WHERE `id` = '".$_SESSION['id']."' OR `receiver_id` = '".$_SESSION['id']."' ORDER BY `message_id` ASC;";
		$result = mysqli_query($conn,$sql);
		$all_message = '';
		//$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$sql1 = "SELECT * FROM `information` WHERE `First_name` = '".$row['name']."';";
				$result1 = mysqli_query($conn,$sql1);
				while($row2 = mysqli_fetch_assoc($result1)){
					$last = $row2['Last_name'];
				}
				
					if($row['System_admin_inbox'] == 'incoming'){
						$all_message .= '<div class="message unread" name="unread" onclick="personal_message('.$row['receiver_id'].')">
											<div class="message-load-name">'.$row['name'].' '.$last.'</div>
											<div class="message-load" id="incoming" onclick="personal_message('.$row['receiver_id'].')">'.$row['name'].':'.$row['message'].'</div>
										</div>';
					}else{
						$all_message .= '<div  class="message unread" name="unread" onclick="personal_message('.$row['receiver_id'].')">
											<div class="message-load-name">'.$row['name'].' '.$last.'</div>
											<div class="message-load" id="outgoing" onclick="personal_message('.$row['receiver_id'].')">You:'.$row['message'].'</div>
										</div>';
					}
				
			}
		}else{
			$all_message = '<div class="empty_convo">no message</div>';
		}
		echo $all_message;
?>
