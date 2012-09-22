/*	its a function to include date plugin into the text box for calander
	and hide show the corrosponding text box according to the search type selected
*/
function cal(){
$("#search").change(function() {var trial=$("#search option:selected").text();
			if(trial == 'Date'){

				$("#nsearch").hide();
				$("#searchdatepicker").show();
				$("#searchdatepicker").datepicker();
				$("#searchdatepicker").datepicker("option", "dateFormat","yy-mm-dd");
				}
				else
				{	
					$("#searchdatepicker").hide();
					$("#nsearch").show();
				}
		});
}
/*
	function jsonSearch is to send the ajax call to server to fetch the search result_resource
	display the result
	and again ajax call to submit the edited data to the database 
*/

function jsonSearch(){
	$("#displayform").html("");
	var datastring = "psearch1="+$("#nsearch").val()+"&"+"psearch2="+$("#searchdatepicker").val()+"&"+"search="+$("#search").val();
$.getJSON("http://localhost/medly/response/search.php?"+datastring,function(data){
	if($("#search").val()=='select'){
	var sform="<h4>Please select a search type</h4>";
	$(sform).appendTo("#displayform");
	}
	else if(data==''){
	var sform="<h4>No result found</h4>";
	$(sform).appendTo("#displayform");
	}
	else{
	$.each(data, function(i,item){
			var sform = 
					"<form id='patientdetail"+i+"'>"
						+"<img class='load' id='load"+i+"' src='img/load.gif' style='margin-top:40px; position:absolute; margin-left:280px; display:none;'>"
						
							+"<input type='hidden' name='pid"+i+"' id='pid"+i+"' value='"+item[6]+"'>"

						+"<div class='row'>"
							+"<span class='label'>"
								+"<label for='patient name'>Name</label>"
							+"</span>"
							+"<input type='text'  class='inputall' maxlength='15' name='pname"+i+"' id='pname"+i+"' value='"+item[0]+"' disabled>"
						+"</div>"
						+"<div class='row'>"
							+"<span class='label'>"
								+"<label for='patient contact'>Contact</label>"
							+"</span>"
							+"<input type='text' class='inputall' maxlength='15' name='pcontact"+i+"' id='pcontact"+i+"' value='"+item[1]+"' disabled>"
						+"</div>"
						+"<div class='row'>"
							+"<span class='label'>"
								+"<label for='patient date'>Date of visit</label>"
							+"</span>"
							+"<input id='datepicker"+i+"' type='text' class='inputall' maxlength='15' name='pdate"+i+"' value='"+item[2]+"' disabled style='width:150px'>"
							+"<img id='calimg"+i+"' src='img/cal.png' style='width:34px; length:34px; position:absolute; margin-top:10px;'></img>"
						+"</div>"
						+"<div class='row'>"
							+"<span class='label'>"
								+"<label for='patient date'>Issue</label>"
							+"</span>"
							+"<textarea class='inputall' name='pissue"+i+"' id='pissue"+i+"' disabled>"+item[3]+"</textarea>"
						+"</div>"
						+"<div class='row'>"
							+"<span class='label'>"
								+"<label for='patient date'>Diagnosis</label>"
							+"</span>"
							+"<textarea class='inputall' name='pdiag"+i+"' id='pdiag"+i+"' disabled >"+item[4]+"</textarea>"
						+"</div>"
						+"<div class='row'>"
							+"<span class='label'>"
								+"<label for='patient date'>Prescription</label>"
							+"</span>"
							+"<textarea class='inputall' name='ppres"+i+"' id='ppres"+i+"' disabled >"+item[5]+"</textarea>"
						+"</div>"
						+"<div class='row'>"
							+"<span class='label'  style='width:140px;'>"
							+"<label></label>"
							+"</span>"
						+"</div>"						
						+"<div class='row'>"
							+"<span class='label'  style='width:140px;'>"
								+"<label></label>"
							+"</span>"
							+"<input type='button' id='bedit"+i+"' value='Edit' style='width:90px; margin-top:20px; cursor:pointer'>"
							+"<input type='button' value='Submit' id='editsubmit"+i+"' style='width:90px; margin-top:20px; float:right; cursor:pointer;'>"
						+"</div>"
					+"</form>"
					+"<hr>"
					$(sform).appendTo("#displayform");
					
					$("#bedit"+i).click(function() {
						$("#pname"+i).removeAttr('disabled').css("background-color","grey");
						$("#datepicker"+i).removeAttr('disabled').css("background-color","grey");
						$("#pcontact"+i).removeAttr('disabled').css("background-color","grey");
						$("#pissue"+i).removeAttr('disabled').css("background-color","grey");
						$("#pdiag"+i).removeAttr('disabled').css("background-color","grey");
						$("#ppres"+i).removeAttr('disabled').css("background-color","grey");
						
						var calval = $("#datepicker"+i).val();

						$("#datepicker"+i).datepicker();
						$("#datepicker"+i).val()=calval;
						$("#datepicker"+i).datepicker("option", "dateFormat","yy-mm-dd");

					});
					// function to send ajax call to server to submit the updated data to database.
					$("#editsubmit"+i).click(function(){
						$("#editsubmit"+i).css("color","red");
						$("#load"+i).show();
							var pid=$('#pid'+i).val();
							var pname=$('#pname'+i).val();
							var datepicker = $('#datepicker'+i).val();
							var pcontact = $('#pcontact'+i).val();
							var pissue = $('#pissue'+i).val();
							var pdiag = $('#pdiag'+i).val();
							var ppres = $('#ppres'+i).val();
						
							var dataString = 'pname='+pname+'&pdate='+datepicker+'&pcontact='+pcontact+'&pissue='+pissue+'&pdiag=' +pdiag+'&ppres='+ppres+'&pid='+pid;
								$.ajax({
									type: "POST",
									url: "response/update.php",
									data: dataString,
									success: function(){
										$("#load"+i).fadeOut('slow');
										$("#pname"+i).attr("disabled","disabled").css("background-color","white");
										$("#datepicker"+i).attr("disabled","disabled").css("background-color","white");
										$("#pcontact"+i).attr("disabled","disabled").css("background-color","white");
										$("#pissue"+i).attr("disabled","disabled").css("background-color","white");
										$("#pdiag"+i).attr("disabled","disabled").css("background-color","white");
										$("#ppres"+i).attr("disabled","disabled").css("background-color","white");
									}
								});
								return false;
						});
		});
		}

	});
	// also can be implemented by .ajax() method
	//	$.ajax({
//					type: "POST",
//					url: "response/search.php",
//					data: datastring,
//					success: function(result){
//					}
//					});
}
