<?php
	include 'connection_database.php';
?>

<!DOTYPE html>
<html lang ="en">
  <head> 
    <meta charset ="UTF-8"> 
    <meta name ="viewport" content ="width=device-width,initial-scale=1">
	<title>CCTMHMS</title>
    <link rel="stylesheet" href="assets/css/style.css">
	<link id="theme" rel="stylesheet" href="assets/css/lightmode.css">
	<script  type='text/javascript'>
				function preventBack(){window.history.forward();};
				setTimeout('preventBack()',0);
				window.onbeforeunload = function(){null;};
	</script>
	<link rel="stylesheet" href="assets/css/calendar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<script   type= "text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
	
  </head>
  <body>
    <!--Main body-->
   <div class="Container">
      <!--Drawer-->
     <div class= "Navigation-Drawer">
       <ul>
	   <!--Institution Name-->
        <li>
		  <a href="#"> 
             <span class="Icon Institution_icon"><div></div></span>
			 <span class="title">CCTMHMS</span>
	      </a>	 
        </li>
	  <!--Dashboard-->	   
		<li onclick="isclick(0)" class="default">
		  <a href="#"> 
		     <span class="Icon dashboard_icon">
			   <svg class='dashboard-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 412 612"><title>ionicons-v5-q</title><path d="M425.7,118.25A240,240,0,0,0,76.32,447l.18.2c.33.35.64.71,1,1.05.74.84,1.58,1.79,2.57,2.78a41.17,41.17,0,0,0,60.36-.42,157.13,157.13,0,0,1,231.26,0,41.18,41.18,0,0,0,60.65.06l3.21-3.5.18-.2a239.93,239.93,0,0,0-10-328.76ZM240,128a16,16,0,0,1,32,0v32a16,16,0,0,1-32,0ZM128,304H96a16,16,0,0,1,0-32h32a16,16,0,0,1,0,32Zm48.8-95.2a16,16,0,0,1-22.62,0l-22.63-22.62a16,16,0,0,1,22.63-22.63l22.62,22.63A16,16,0,0,1,176.8,208.8Zm149.3,23.1-47.5,75.5a31,31,0,0,1-7,7,30.11,30.11,0,0,1-35-49l75.5-47.5a10.23,10.23,0,0,1,11.7,0A10.06,10.06,0,0,1,326.1,231.9Zm31.72-23.1a16,16,0,0,1-22.62-22.62l22.62-22.63a16,16,0,0,1,22.63,22.63ZM423.7,436.4h0ZM416,304H384a16,16,0,0,1,0-32h32a16,16,0,0,1,0,32Z"></path></svg>
			 </span>
			 <span class="title">Dashboard</span>
		  </a>
		</li> 
	  <!--Profile-->	   
		<li onclick="isclick(1)" class="Profile-button">
		  <a href="#"> 
		     <span class="Icon Profile_icon">
				<svg class='profile-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 412 612"><title>ionicons-v5-j</title><path d="M332.64,64.58C313.18,43.57,286,32,256,32c-30.16,0-57.43,11.5-76.8,32.38-19.58,21.11-29.12,49.8-26.88,80.78C156.76,206.28,203.27,256,256,256s99.16-49.71,103.67-110.82C361.94,114.48,352.34,85.85,332.64,64.58Z"></path><path d="M432,480H80A31,31,0,0,1,55.8,468.87c-6.5-7.77-9.12-18.38-7.18-29.11C57.06,392.94,83.4,353.61,124.8,326c36.78-24.51,83.37-38,131.2-38s94.42,13.5,131.2,38c41.4,27.6,67.74,66.93,76.18,113.75,1.94,10.73-.68,21.34-7.18,29.11A31,31,0,0,1,432,480Z"></path></svg>
			 </span>
			 <span class="title">Profile</span>
		  </a>
		</li>	
      <!--Inbox-->	   
		<li onclick="isclick(2)" class="Inbox-button"> 
		  <a href="#"> 
		     <span class="Icon Inbox_icon">
			    <svg class='inbox-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 412 612"><title>ionicons-v5-o</title><path d="M424,80H88a56.06,56.06,0,0,0-56,56V376a56.06,56.06,0,0,0,56,56H424a56.06,56.06,0,0,0,56-56V136A56.06,56.06,0,0,0,424,80Zm-14.18,92.63-144,112a16,16,0,0,1-19.64,0l-144-112a16,16,0,1,1,19.64-25.26L256,251.73,390.18,147.37a16,16,0,0,1,19.64,25.26Z"></path></svg>
				<p class="notif"><sup id='notification_count'></sup></p>
			 </span>
			 <span class="title" id="inbox_message">Inbox<sup id='notification_count_inbox'></sup></span>
		  </a>
		</li>
	  <!--Assessment-->	   
		<li onclick="isclick(3)" class="Assessment-button">
		  <a href="#"> 
		     <span class="Icon Assessment_icon">
				<svg class='assessment-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-l</title><path d="M368,32H144A64.07,64.07,0,0,0,80,96V416a64.07,64.07,0,0,0,64,64H368a64.07,64.07,0,0,0,64-64V96A64.07,64.07,0,0,0,368,32ZM256,304H176a16,16,0,0,1,0-32h80a16,16,0,0,1,0,32Zm80-80H176a16,16,0,0,1,0-32H336a16,16,0,0,1,0,32Zm0-80H176a16,16,0,0,1,0-32H336a16,16,0,0,1,0,32Z"></path></svg>
			 </span>
			 <span class="title">Assessment</span>
		  </a>
		</li>		
	  <!--History-->	   
		<li onclick="isclick(4)" class="History-button">
		  <a href="#"> 
		     <span class="Icon History_icon">
				<svg class='history-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="40 -100 290 680"><path d="M256 0C 397.4 0 512 114.6 512 256C 512 397.4 397.4 512 256 512C 201.7 512 151.2 495 109.7 466.1C 95.2 455.1 91.64 436 101.8 421.5C 111.9 407 131.8 403.5 146.3 413.6C 177.4 435.3 215.2 448 256 448C 362 448 448 362 448 256C 448 149.1 362 64 256 64C 202.1 64 155 85.46 120.2 120.2L120.2 120.2L151 151C 166.1 166.1 155.4 192 134.1 192L134.1 192L24 192C 10.75 192 0 181.3 0 168L0 168L0 57.94C 0 36.56 25.85 25.85 40.97 40.97L40.97 40.97L74.98 74.98C 121.3 28.69 185.3 0 255.1 0L255.1 0L256 0zM256 128C 269.3 128 280 138.7 280 152L280 152L280 246.1L344.1 311C 354.3 320.4 354.3 335.6 344.1 344.1C 335.6 354.3 320.4 354.3 311 344.1L311 344.1L239 272.1C 234.5 268.5 232 262.4 232 256L232 256L232 152C 232 138.7 242.7 128 256 128z"></path></svg>
			 </span>
			 <span class="title">History</span>
		  </a>
		</li>
		  <!--Setting-->	   
		<li onclick="isclick(5)" class="Setting-button">
		  <a href="#"> 
		     <span class="Icon Setting_icon" >
				<svg class='setting-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 400 612"><title>ionicons-v5-q</title><circle cx="256" cy="256" r="48"></circle><path d="M470.39,300l-.47-.38-31.56-24.75a16.11,16.11,0,0,1-6.1-13.33l0-11.56a16,16,0,0,1,6.11-13.22L469.92,212l.47-.38a26.68,26.68,0,0,0,5.9-34.06l-42.71-73.9a1.59,1.59,0,0,1-.13-.22A26.86,26.86,0,0,0,401,92.14l-.35.13L363.55,107.2a15.94,15.94,0,0,1-14.47-1.29q-4.92-3.1-10-5.86a15.94,15.94,0,0,1-8.19-11.82L325.3,48.64l-.12-.72A27.22,27.22,0,0,0,298.76,26H213.24a26.92,26.92,0,0,0-26.45,22.39l-.09.56-5.57,39.67A16,16,0,0,1,173,100.44c-3.42,1.84-6.76,3.79-10,5.82a15.92,15.92,0,0,1-14.43,1.27l-37.13-15-.35-.14a26.87,26.87,0,0,0-32.48,11.34l-.13.22L35.71,177.9A26.71,26.71,0,0,0,41.61,212l.47.38,31.56,24.75a16.11,16.11,0,0,1,6.1,13.33l0,11.56a16,16,0,0,1-6.11,13.22L42.08,300l-.47.38a26.68,26.68,0,0,0-5.9,34.06l42.71,73.9a1.59,1.59,0,0,1,.13.22A26.86,26.86,0,0,0,111,419.86l.35-.13,37.07-14.93a15.94,15.94,0,0,1,14.47,1.29q4.92,3.11,10,5.86a15.94,15.94,0,0,1,8.19,11.82l5.56,39.59.12.72A27.22,27.22,0,0,0,213.24,486h85.52a26.92,26.92,0,0,0,26.45-22.39l.09-.56,5.57-39.67a16,16,0,0,1,8.18-11.82c3.42-1.84,6.76-3.79,10-5.82a15.92,15.92,0,0,1,14.43-1.27l37.13,14.95.35.14a26.85,26.85,0,0,0,32.48-11.34,2.53,2.53,0,0,1,.13-.22l42.71-73.89A26.7,26.7,0,0,0,470.39,300ZM335.91,259.76a80,80,0,1,1-83.66-83.67A80.21,80.21,0,0,1,335.91,259.76Z"></path></svg>
			 </span>
			 <span class="title">Setting</span>
		  </a>
		</li>
	  <!--Logout-->	   
		<li onclick="isclick(6)" class="Logout-button">
		  <a href="logout.php"> 
		     <span class="Icon Logout_icon">
				<svg class="logout-icon" xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 0 300 512"><title>ionicons-v5-o</title><path d="M160,256a16,16,0,0,1,16-16H320V136c0-32-33.79-56-64-56H104a56.06,56.06,0,0,0-56,56V376a56.06,56.06,0,0,0,56,56H264a56.06,56.06,0,0,0,56-56V272H176A16,16,0,0,1,160,256Z"></path><path d="M459.31,244.69l-80-80a16,16,0,0,0-22.62,22.62L409.37,240H320v32h89.37l-52.68,52.69a16,16,0,1,0,22.62,22.62l80-80a16,16,0,0,0,0-22.62Z"></path></svg>
			 </span>
			 <span class="title">Logout</span>
		  </a>
		</li>		
	   </ul>
    </div> 
	<!--End of Drawer-->
	
	<!--App bar-->
	  <div class="Appbar">
	    <!--Drawer-->
	     <div class="Content">
	      <div class="Drawer">
		    <div></div>
			<div></div>
			<div></div>
		  </div>
		<!--user-->
		 <div class="user">
		   <!--user information-->
		    <div class="profile-container">
		       <div class="user_logo" id='user-logo'></div>
		       <p class="name" id='main-name'></p>
		       <div class="info">i</div>
		    </div>
		 </div>
	     </div> 
	   
  
	 <!--start main body-->
	 <div class="mainbody">
	 <!--start dashboard body-->
	 <div class ='main-content'>
		   <div class='Table'>
			 <div class='institution_ dashboard'>
			   <div class='institution-body'>
				 <div class='shape1'></div>
				 <div class='shape2'></div>
				 <div class='shape3'></div>
				 <div class='institution-logo'></div>
				 <div class='institution-title'>Hello, John</div>
			   </div>
			   	<div class="btn-container">
				<div class="btn-calendar">
					<button type="button" onclick="show()">Calendar</button>
					<script>
					</script>
				</div>
				<div class="btn-notification">
					<button onclick="isclick(2)" href='#'>Notification</button>
				</div>
		       	</div>
			  </div>
			  <div class='profile_ dashboard' ><a href='#' onclick='isclick(1)'> Profile</a></div>
			  <div class='inbox_ dashboard' ><a href='#' onclick='isclick(2)'> Inbox</a></div>
			  <div class='assessment_ dashboard' ><a href='#' onclick='isclick(3)'>Assessment</a></div>
			  <div class='history_ dashboard' ><a href='#' onclick='isclick(4)'> History</a></div>
			  <div class='setting_ dashboard' ><a href='#' onclick='isclick(5)'> Setting</a></div>
		   </div>
		   
		   
	
		   <div class='Date_Notification_Table'>
		   
			   <div class='calendar'>
			  <!--display month-->
				<div class="calendar_body">
					<div class="month">
						<div class="fas fa-angle-left prev"></div>
						<div class="currmonth">
							<div><h1></h1></div>
							<div><p></p></div>
						</div>
						<div class="fas fa-angle-right next"></div>
					</div>
					<!--display weekdays-->
					<div class="weekdays">
						<div>Sun</div>
						<div>Mon</div>
						<div>Tue</div>
						<div>Wed</div>
						<div>Thu</div>
						<div>Fri</div>
						<div>Sat</div>
					</div>
					<div class="days">
						<div class="prev-date">28</div>
						<div class="prev-date">29</div>
						<div class="prev-date">30</div>
						<div class="prev-date">31</div>
						<div>1</div>
						<div>2</div>
						<div>3</div>
						<div>4</div>
						<div>5</div>
						<div>6</div>
						<div>7</div>
						<div>8</div>
						<div>9</div>
						<div>10</div>
						<div>11</div>
						<div>12</div>
						<div>13</div>
						<div>14</div>
						<div>15</div>
						<div>16</div>
						<div class="current-date">17</div>
						<div>18</div>
						<div>19</div>
						<div>20</div>
						<div>21</div>
						<div>22</div>
						<div>23</div>
						<div>24</div>
						<div>25</div>
						<div>26</div>
						<div>27</div>
						<div>28</div>
						<div>29</div>
						<div>30</div>
						<div class="next-date">1</div>
						
					</div>
				</div>
				
			 
				</div>
				
			 
			  
		   
		    <div class='notification'>Notification</div>
		</div>
	</div>
     <!--end dashboard body-->
	 
     <!--start dashboard body-->
	 	 <div class='Profile-Content'>
		   <div class='User-Profile'>
				<div class='user-information-title'>Student Information</div>
				<div class='User-information'>
				    <div class='Profile-picture'><div class='main-profile'></div></div>
					<div class='user-data-content'>
					   <div class='User-data'><p>Name</p>:<p class='user-name' id='user-name'></p></div>
					   <div class='User-data'><p>Id-number</p>:<p class='user-id-number' id='user-id-number'></p></div>
					   <div class='User-data'><p>Management</p>:<p class='user-management' id='user-management'></p></div>
					   <div class='User-data'><p>E-mail</p>:<p class='user-mail' id='user-mail'></p></div>
					   <div class='User-data'><p>Status</p>:<p class='user-status' id='user-status'></p></div>
				    </div>
				</div>
				 <div class='user-personal-information-title'>Student Personal Information</div>
				 <div class='Personal-information'>
					<div class='user-personal-data'><p>First Name</p>:<p class='user-first' id='user-first'></p></div>
					<div class='user-personal-data'><p>Last Name</p>:<p class='user-last' id='user-last'></p></div>
					<div class='user-personal-data'><p>Middle Name</p>:<p class='user-middle' id='user-middle'></p></div>
					<div class='user-personal-data'><p>Gender</p>:<p class='user-gender' id='user-gender'></p/></div>
					<div class='user-personal-data'><p>Birthday</p>:<p class='user-birthdate' id='user-birthdate'></p></div>
					<div class='user-personal-data'><p>Birth Place</p>:<p class='user-birthplace' id='user-birthplace'></p></div>
				 </div>
			</div>		 
		 </div>
	  <!--end profile body-->
		 
	  <!--start of inbox body-->
	     <div class='Inbox-Content'>
			<div class='Notification-title'>Notification</div>
			<div class='tools' id='tools'>
				<div  class='dropdown_menu' onclick='dropdown_menu()' ></div>
				<div class='archive'  onclick='archiveshow()'>A</div>
				<input type='checkbox' class='checkbox' id='select_all' onchange='selectall()'>
				<label for='select_all' class='selectall' id='selectall'>Select All</label>
				<input type='button' class='send-to-archive' value='ok'>
			</div>
			<div class='message-chat'>
				<div class='messages'>
					<div class='message-content' id='message-content-all'>All Messages</div>
					<div class='message-content read_message' id='message-content-read'>Read Messages</div>
					<div class='message-content unread_message' id='message-content-unread'>Unread Messages</div>	
				</div>
				<div class='chatbox'>
					<div class='systemad-icon'></div>
					<div class='systemad-name'>psychometrician</div>
					<div class='message-box' id='message-box'></div>
					<form action=' ' class='form' method='POST'>
						<div class='message-holder' >
							<textarea placeholder='Type a message...' class='text-message' id='text-message' value=''></textarea>
						</div>
						<input type='button' class='send-button' id='send-button' value='send' onclick='sendMessage()'></input>
					</form>
				</div>			 
			</div>
				<div class='dropdown-menu-content'>
					<div class='option all-message' id='all-message'>All</div>
					<div class='option read-message' id='read-message'>Read</div>
					<div class='option unread-messsage' id='unread-message'>Unread</div>
				</div>
	    </div>
	  <!--end of inbox body-->
	  <!--start of assessment body-->
	    <div class='Assessment-Content'>
			 <div class='Assessment_title'>Assessment
			    <div class='assessment_body'>
					<div class='assessment_button' id="take"></div>
					<div class = "answer-page" id = "a-page">
					<form class='s'>
						<table class="Stress-q" id="Stress-q">
								<tr id = "header-holder-s">
									<th>Items</th>
									<th>Questionnaire</th>
									<th id="option_1_1"></th>
									<th id="option_2_1"></th>
									<th id="option_3_1"></th>
									<th id="option_4_1"></th>
								</tr>
						
						</table>
					</form>
					<input type="submit" class="s-next" id="s-next" value="Next">
					<form class="d">
						<table id="Depression-q" class="Depression-q">
								<tr id = "header-holder-s">
									<th>Items</th>
									<th>Questionnaire</th>
									<th id="option_1_4"></th>
									<th id="option_2_4"></th>
									<th id="option_3_4"></th>
									<th id="option_4_4"></th>
								</tr>
							
						</table>
					</form>
					<input type="submit" class="d-next" id="d-next" value="Submit">
					<form class="a">
							<table id="Anxiety-q" class="Anxiety-q">
								<tr id = "header-holder-s">
									<th>Items</th>
									<th>Questionnaire</th>
									<th id="option_1_3"></th>
									<th id="option_2_3"></th>
									<th id="option_3_3"></th>
									<th id="option_4_3"></th>
								</tr>
							</table>
					</form>
					<input type="submit" class="a-next" id="a-next" value="Next">
					<form class="sl">
						<table id="Sleep-q" class="Sleep-q">
							<tr id = "header-holder-s">
								<th>Items</th>
								<th>Questionnaire</th>
								<th id="option_1_2"></th>
								<th id="option_2_2"></th>
								<th id="option_3_2"></th>
								<th id="option_4_2"></th>
							</tr>
						</table>
					</form>
					<input type="submit" class="sd-next" id="sd-next" value="Next">
					
						
					</div>
			    </div>
			 </div>
			
 		</div>
	  <!--end of assessment body-->
	  <!--start of history body-->
	<div class='History-Content'>
			<!--start dashboard body-->
		<div class="dash_1" id="dash_1">
			<div class="card_data_status">
				<div class="Average-chart">
				<select class="selection-box-graph" id="dropdown-topic-graph-line"  onchange="request_history();">		
						<option class="content_tab" >Stress</option>
						<option class="content_tab" >Anxiety</option>
						<option class="content_tab" >Depression</option>
						<option class="content_tab" >Sleep Disorder</option>
				</select>
				<input type="button" class="view-recom" id="view-recom" value="Recommendations" onclick="view_recom()">
				</div>
				<div class="charts">
					<canvas id="line"></canvas>
				</div>
			</div>
			<div class="card_data_status">
				<div class="history-list" id="history-list">
				  <table>	
				  </table>
				</div>
			</div>	
		
		</div>	
		<div class="assessment-data-page" id="assessment-data-page">
				<div class="recommendation-table">
					<div class="content-header">
						<div class="title">Recommendations</div>
						<input type="button" id="back-button-recom" class="back-button-page" value="X">
					</div>
					<div class="table-holder-data" id="recom-list">
						<table>
							
						</table>
					</div>
				</div>
		</div>
	</div>
	  <!--end of history body-->
	  
	  <!--start of setting body-->
	     <div class='Setting-Content'>
			 <div class='Setting_title'>Setting
			   <div class='setting_body'>
				 <div class='setting_box darkmode'>
				     <div class='switch-body'>
					    <input id='input-switch' class='input-switch' type='checkbox'>
						<label class='label-switch' for='input-switch'>
							<div class='switch-toggle'></div>
						</label>
					 </div>
				 </div>
				 <div class='setting_box archivefile'>
					<div>Archive</div>
				</div>
				 <div class='setting_box accounts'>
					<div>Accounts</div>
				</div>
			   </div>
			   
			   <!--for archives-->
			   <div class='archives-container'>
			   <!--set the before css-->
					<div class='archives'>back</div>
					<div class='archives-list'  id='archives-list'></div>
			   </div>
			   <!--end of archive list container-->
			   <div class='change-password-container'>
			        <div class='back-button'>back</div>
					<div class='form-container'>
						<form action='#' method='POST'>
						     <div class='cotainer-box'>
								<label for='old-password'>password</label><br>
								<input class='old-password' type='password'>
							</div>
							<br>
							<div class='cotainer-box'>
								<label for='change-password'>new password</label><br>
								<input class='change-password'  type='password'>
							</div>
							<br>
							<div class='cotainer-box'>
								<label for='new-password'>rewrite password</label><br>
								<input class='new-password' type='password'>
							</div>
							<br>
							<div class='submit-button'>
								<input type='submit' value='submit'>
							</div>
						</form>
					</div>
			   </div>
			 </div> 
		</div>
	    </div>
	 <!--end main body-->
	    </div>
	  <script src="assets/javascript/event.js"></script>
	  <script src="assets/javascript/calendarscript.js"></script>
	  <script src="assets/javascript/test_function.js"></script>
    </div>
	
  </body>
</html>