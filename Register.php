<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Record | Register</title>

<link href="Style/Style.css" rel="stylesheet">
<script type="text/javascript" src="jquery-2.1.4.js"></script>

<style>

</style>

<script type="text/javascript" src="jquery-2.1.4.js"></script>

<script type="text/javascript">

</script>



</head>

<body bgcolor="#dfdfdf">

<div class="header1">

<a href="ViewPatient.php" style="border:none;">View Patient Records </a>  <a href="Register.php">REGISTER</a>
</div>



<div  class="material" id="myForm" >
 
<hr>
<p align="center">PATIENT INFO</p><br><br><br><br></br>
<p align="center" id="errMsg"></p>
	
<span for="fname">This field is required</span><span for="lname">This field is required</span><br>


<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name"/>
<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"/>

<span for="age" >This field is required</span><span for="dob">This field is required</span><br>

	<input type="text" name="age"  id="age" onkeypress="return isNumber(event,this.id)" placeholder="Age" maxlength="3"/>
	<input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth"/>

		<span for="sex">This field is required</span><span for="phn" >This field is required</span><br>
		
		<select name="sex" id="sex" class="form-control" placeholder="Gender">
		<option>Male</option>
		<option>Female</option>
		</select>

	<input type="text" name="phn" id="phn" onkeypress='return isNumber(event,this.id)' placeholder="Phone No." maxlength="13"/>
	
	<span for="msg">This field is required</span>
	<textarea cols="30" name="msg" id="msg" class="form-control" placeholder="Write any Information.." style="width:95%;;height:200px;resize: none"></textarea>
	

<br></br><button  id="submit" >REGISTER NOW</button>

<button  type="button" id="reset" onclick="resetForm()">RESET</button>

</div>


<p id="showMessage"></p>


<script  src="jquery-2.1.4.js"></script>
<script>


		
		function isNumber(evt,id){
		    var charCode = (evt.which) ? evt.which : evt.keyCode;
		    if (charCode > 31 && (charCode < 48 || charCode > 57)){ 
		    	document.getElementById("errMsg").style.visibility="visible";	
		    	document.getElementById("errMsg").innerHTML="Only Numbers are allowed";
		    	document.getElementById("errMsg").style.padding="10px";
		        return false;
		        
		    }
		    document.getElementById("errMsg").style.visibility="hidden";
		    return true;
			
		    
		}
		
//form validation	

$(document).ready(function() {

	
		$('#reset').click(function(){

			$('input,select,textarea').val("");
		});
	

//allowing only numeric input to age and phone no. fields
		
		$('#submit').click(function(e) {
			
			        var isValid = true;
			        var $myLabel="";
			        $('input,select ,textarea').each(function() {
					
			            if ($.trim($(this).val()) == '') {
			
			                isValid = false;
			
			                $(this).css({"border": "1px solid #dd0000"});
			                $myLabel = $('span[for="'+ this.id +'"]');
			                $myLabel.css({'visibility':'visible'});
			                $myLabel.text('This field is required.');
			            }
			
			            else {
			
			                $(this).css({"border": "",	});
			                $myLabel = $('span[for="'+ this.id +'"]');
			                $myLabel.css({'visibility':'hidden'});	
			            }
			
			        });
			
			        if (isValid == false)
			
			            e.preventDefault();
			
			        else{
			
			           // alert('submittied');
		            	
						$('#showMessage').hide();
			
						
							$.ajax({
								
								type:"POST",
								url:"Reg_Script.php",
								data:{
										fname:$('#fname').val(),
										lname:$('#lname').val(),
										age:$('#age').val(),
										dob:$('#dob').val(),
										phone:$('#phn').val(),
										sex:$('#sex').val(),
										msg:$('#msg').val()
								},
								success:function(response){
									if (response === "true") {
										$('#showMessage').css({'padding':'15px 20px'});
										$('#showMessage').html("Patient Record added successfully.").fadeIn().delay(3000).fadeOut("slow");
										$('input,select,textarea').val("");
										}
								}
					           
						});
				}
		});
				
		});

	
</script>

</body>
</html>