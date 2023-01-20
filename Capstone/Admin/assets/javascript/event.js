

// add hovered class to selected list item

let list = document.querySelectorAll(".Navigation-Drawer li");
var cname = document.querySelector(".mainbody");
function activeLink() {
  list.forEach((item) => { 
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".Drawer");
let navigation = document.querySelector(".Navigation-Drawer");
let main = document.querySelector(".Appbar");
let main_body = document.querySelector(".mainbody");

let dashboard_content = document.querySelector('.main-content');
let record_content = document.querySelector('.Record-Content');
let accounts_content = document.querySelector('.Accounts-Content');

let setting_content = document.querySelector('.Setting-Content');
let setting_list = document.querySelector('.setting_body');
let modify_acc = document.querySelector('.accounts');
let account_back = document.querySelector('.back-button');
let change_pass_container = document.querySelector('.change-password-container');
var temp_navdrawer =  document.getElementsByClassName("Navigation-Drawer");
var temp_appbar = document.getElementsByClassName("Appbar");
var temp_mainbody = document.getElementsByClassName("mainbody");
var message_notif_in = document.getElementById("inbox_message");
let notification_count = document.getElementById('notification_count');
let notification_count_in = document.getElementById('notification_count_inbox');
var count = 0;
var opendrawer = true;
let counter= 0;

account_back.onclick = function(){
	archive_container.style.display = 'none';
	setting_list.style.display = 'grid';
	change_pass_container.style.display ='none';
};
modify_acc.onclick = function() {
	archive_container.style.display = 'none';
	setting_list.style.display = 'none';
	change_pass_container.style.display ='block';
};


function drawer_function(open_close){
		
	if(opendrawer && open_close){
		navigation.classList.toggle("active");
		main.classList.toggle("active");
		main_body.classList.toggle("active");
		opendrawer = false;
		
	}
};


toggle.onclick = function () {

	opendrawer = !opendrawer;
	console.log(opendrawer);
  navigation.classList.toggle("active");
  main.classList.toggle("active");
  main_body.classList.toggle("active");
  /*if(!opendrawer){
	  drawer_function(false);
  }else{
	   drawer_function(true);
  }*/
   
};
function removeHover(){
	list.forEach((item) => { 
    item.classList.remove("hovered");
  });
};


function isclick( index){
	if(index==0){		
		dashboard_content.style.display = 'grid';
		record_content.style.display = 'none';
		setting_content.style.display = 'none';
		accounts_content.style.display = 'none';
		drawer_function(true);
	}
	else if(index==1){
	    record_content.style.display = 'block';
		dashboard_content.style.display = 'none';
		setting_content.style.display = 'none';
		accounts_content.style.display = 'none';
		removeHover();
		document.querySelector(".Record-button").classList.add("hovered");
		drawer_function(true);
		req_pending_data();
	}else if(index==5){
		record_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		setting_content.style.display = 'block';
		accounts_content.style.display = 'none';
		removeHover();
		document.querySelector(".Setting-button").classList.add("hovered");
		setting_list.style.display = 'grid';
		change_pass_container.style.display ='none';		
		drawer_function(true);
		
	}else if(index==3){
		record_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		setting_content.style.display = 'none';
		accounts_content.style.display = 'block';
		removeHover();
		document.querySelector(".Account-button").classList.add("hovered");
		drawer_function(true);
		req_account_data();
		req_pending_data();
	}else if(index==6){
		console.log('logout');
		var log_out = new XMLHttpRequest();
		log_out.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				
			}
		};	
		log_out.open('POST','logout.php',true);
		log_out.send();
	}
	
};

if(localStorage.getItem('Darkmode') === null){
	localStorage.setItem('Darkmode','false');
}
var theme = document.getElementById('theme');
var switch_button = document.querySelector("input[type='checkbox'].input-switch");
var switch_button_click = document.getElementById("input-switch");
switch_button_click.onclick = function(){
	if(localStorage.getItem('Darkmode') === 'true'){
		switch_button.checked = false;
		localStorage.setItem('Darkmode','false');
		theme.setAttribute('href',"assets/css/lightmode.css");
	}else{
		switch_button.checked = true;
		localStorage.setItem('Darkmode','true');
		theme.setAttribute('href',"assets/css/darkmode.css");
	}
}
function check_state(){
	if(localStorage.getItem('Darkmode') === 'true'){
		theme.setAttribute('href',"assets/css/darkmode.css");
		switch_button.checked = true;
	}else{
		switch_button.checked = false;
		theme.setAttribute('href',"assets/css/lightmode.css");
	}
}
check_state();
//requesting pending data
function req_pending_data(){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data = this.responseText;
			let pending_table = document.getElementById("pending_data");
			pending_table.innerHTML = data;
		}
	};
	req.open('POST','req_pending_data.php',true);
	req.setRequestHeader("content-type","application/x-www-form-urlencoded");
	req.send("pending="+'pending_data');
};
//insert the osas accounts inside the accounts table
function accepted(id_user){
	//create an ui to pending request for interaction that the request is processing
	let xttp_accept =  new XMLHttpRequest();
	xttp_accept.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			//will receive a message if accept or decline 
			let res = this.responseText;
			if(res == "accepted"){
			   alert("the account has been accepted");
			}else if(res == "decline"){
			   alert("the account has been declined");
			}else{
			   alert(res);
			}
		}
	};
	xttp_accept.open("POST","process_user.php",true);
	xttp_accept.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xttp_accept.send("accept="+id_user+"&admin_req="+'accepted');
};
//default table 
function default_table(){
    var text = "";
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_acc.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_accounts.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text);
 };
function declined(id_user){
	let xttp_decline =  new XMLHttpRequest();
	xttp_decline.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			//will receive a message if accept or decline 
			let res = this.responseText;
			if(res == "accepted"){
			   alert("the account has been accepted");
			}else if(res == "declined"){
			   alert("the account has been declined");
			}else{
			   alert(res);
			}
		}
	};
	xttp_decline.open("POST","process_user.php",true);
	xttp_decline.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xttp_decline.send("decline="+id_user+"&admin_req="+'decline');
};
//Activate / Deactivate account
function account_value(acc_value){
	let  xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			default_table();		
			alert(this.responseText);
			
		}
	};
	xhr.open('POST','edit_datas.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send("acc_value="+acc_value);
 };

let table_acc = document.querySelector("#acc_tab table");
//search accounts
var search_acc = document.getElementById('search-bar-accounts');
search_acc.onkeyup = function(){
	var text = "";
	if(search_acc.value == ""){
		text = "";
	}else{
       text = search_acc.value;
	}
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_acc.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_accounts.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text);
};
//req account
function req_account_data(){
		var text = search_acc.value;
		var xttp = new XMLHttpRequest();
		xttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var result = this.responseText;
				table_acc.innerHTML = result;
			}
		};
		xttp.open('POST','data_search_accounts.php',true);
		xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xttp.send('search='+text);
};



//variable dataconst update_first_name = document.getElementById("update_first_name");
const update_middle_name = document.getElementById("update_middle_name");
const update_last_name = document.getElementById("update_last_name");
const update_id_number = document.getElementById("update_id_number");
const update_management = document.getElementById("update_management");
const update_section = document.getElementById("update_section");
const update_gender = document.querySelectorAll("input[type='radio'].update_gender");
const update_birthday = document.getElementById("update_birthday");
const update_birthplace = document.getElementById("update_birth_place");
const submit_data = document.getElementById("submit-data-edit");
const edit_page = document.querySelector(".update_table");
const back_update = document.getElementById('back-button-update');

back_update.addEventListener("click",function(){
	edit_page.style.display = "none";
});
//edit data
function edit_data_student(std_edit){
	data = std_edit;
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			const edit_data_array = JSON.parse(this.responseText);
			update_first_name.value = edit_data_array[0][0];
			update_middle_name.value = edit_data_array[0][2];
			update_last_name.value = edit_data_array[0][1];
			update_id_number.value = edit_data_array[0][6];
			update_management.value = edit_data_array[0][7];
			update_birthday.value = edit_data_array[0][4];
			update_birthplace.value = edit_data_array[0][5];
			id_std = edit_data_array[0][10];
			/*if(edit_data_array[0][3] == "Male"){
				update_gender.forEach((item) =>{
					console.log(item);
					if(item.value == "Male"){
						
						item.setAttribute("selected",true);
						gender_val = "Male";
					}else{
						item.removeAttribute("checked");
					}
				});
			}else{
				update_gender.forEach((item) =>{
					if(item.value == "Female"){
						item.setAttribute("selected",true);
						gender_val = "Female";
					}else{
						item.removeAttribute("checked");
					}
				});
			}*/
			edit_page.style.display = "flex";
		}
	};
	xhr.open('POST','edit_datas.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send("acc_id="+data);
};