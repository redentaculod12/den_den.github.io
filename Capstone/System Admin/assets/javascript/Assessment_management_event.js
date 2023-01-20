//var add_assessment_questionnaire_stress = document.getElementById("Add-questionnaire-stress");
var view_assessment_questionnaire_stress = document.getElementById("View-questionnaire-stress");
//var add_assessment_questionnaire_anxiety = document.getElementById("Add-questionnaire-anxiety");
var view_assessment_questionnaire_anxiety = document.getElementById("View-questionnaire-anxiety");
//var add_assessment_questionnaire_depression = document.getElementById("Add-questionnaire-depression");
var view_assessment_questionnaire_depression = document.getElementById("View-questionnaire-depression");
//var add_assessment_questionnaire_sleep = document.getElementById("Add-questionnaire-sleep");
var view_assessment_questionnaire_sleep = document.getElementById("View-questionnaire-sleep");

//variable for add/view assessment content/questionnaire
var add_assessment_page = document.getElementById("assessment-add-page");
var assessment_data_page = document.getElementById("assessment-data-page");

//variable for back button
var back_button_questionnaire_add = document.getElementById("back-button-questionnaire-add");
var back_button_questionnaire_edit = document.getElementById("back-button-questionnaire-edit");

//variable for edit textfield
var edit_assessment_page = document.getElementById("assessment-edit-page");
var edit_questionnaire = document.getElementById("edit_questionnaire");
var edit_option_1 = document.getElementById("edit_option_1");
var edit_option_2 = document.getElementById("edit_option_2");
var edit_option_3 = document.getElementById("edit_option_3");
var edit_option_4 = document.getElementById("edit_option_4");

var state ="";//this is to set the state page of add and view assesssment
function editTable(table_id){
	edit_assessment_page.style.display = "flex";
	assessment_data_page.style.display = "none";
	var question = document.getElementById(("question_"+table_id)).innerText;
	var option_1 = document.getElementById("option_1_"+table_id).innerText;
	var option_2 = document.getElementById("option_2_"+table_id).innerText;
	var option_3 = document.getElementById("option_3_"+table_id).innerText;
	var option_4 = document.getElementById("option_4_"+table_id).innerText;
	
	edit_questionnaire.value = question;
	edit_option_1.value = option_1
	edit_option_2.value = option_2;
	edit_option_3.value = option_3;
	edit_option_4.value = option_4;
}

//Stress buttons function event
//add_assessment_questionnaire_stress.addEventListener("click",function(){
	//state = "stress";
	//add_assessment_page.style.display = "flex";

//});

//for assessment list req
function req_view(topic){
	let xtp_req_sleep = new XMLHttpRequest();
	xtp_req_sleep.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			let list = document.querySelectorAll('.assessment-data-page .table-holder-data table');
			list.forEach((item)=>{
				item.innerHTML  = this.responseText;
			});
			assessment_data_page.style.display = "flex";
		}
	};
	xtp_req_sleep.open('POST','req_questionnaire.php',true);
	xtp_req_sleep.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xtp_req_sleep.send("view="+topic);
};
view_assessment_questionnaire_stress.addEventListener("click",function(){
	state = "stress";
	assessment_data_page.style.display = "flex";
	req_view('Stress');
});
//anxiety buttons function event
//add_assessment_questionnaire_anxiety.addEventListener("click",function(){
	//state = "anxiety";
	//add_assessment_page.style.display = "flex";
//});
view_assessment_questionnaire_anxiety.addEventListener("click",function(){
	state = "anxiety";
	assessment_data_page.style.display = "flex";
	req_view('Anxiety');
});

/*Stress buttons function event
add_assessment_questionnaire_depression.addEventListener("click",function(){
	state = "depression";
	add_assessment_page.style.display = "flex";
});*/
view_assessment_questionnaire_depression.addEventListener("click",function(){
	state = "depression";
	assessment_data_page.style.display = "flex";
	req_view('Depression');
});

/*Stress buttons function event
add_assessment_questionnaire_sleep.addEventListener("click",function(){
	state = "sleep";
	add_assessment_page.style.display = "flex";
});*/


view_assessment_questionnaire_sleep.addEventListener("click",function(){
	state = "sleep";
	req_view('Sleep Disorder');
});

back_button_questionnaire_add.addEventListener("click",function(){
	add_assessment_page.style.display = "none";
	assessment_data_page.style.display = "none";
});
back_button_questionnaire.addEventListener("click",function(){
	assessment_data_page.style.display = "none";
});
	
back_button_questionnaire_edit.addEventListener("click",function(){
	assessment_data_page.style.display = "flex";
	edit_assessment_page.style.display = "none";
});

var back_button_questionnaire_a = document.getElementById("back-button-questionnaire-assessment");

back_button_questionnaire_a.addEventListener("click",function(){
	add_assessment_page.style.display = "none";
	assessment_data_page.style.display = "none";
	view_r_page.style.display = "none";
});
//make an function that have parameter of the id of */