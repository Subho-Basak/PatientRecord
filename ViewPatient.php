 <?php
include "./connect_db.inc";
$connection = db_connect ();

if (! $connection) {
	print ("cannot connect to database") ;
	exit ();
}

$sqlQuery = "select * from patientregister";

$result =mysql_query ( $sqlQuery, $connection );
$row_count = mysql_num_rows ( $result );

if($row_count==0){
	$hide="visibility:hidden";
	$message="NO RECORDS FOUND.";
}else{
	$hide="visibility:visible";
}
 //echo json_encode(array($result));
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Record | View Patient Records</title>

<link href="Style/Style.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

</head>

<body bgcolor="#fff">

<div class="header1">
<input type="text" id="srch" placeholder="SEARCH BY PATIENT NAME" />
<label>&#128269;</label>
<a href="ViewPatient.php" >View Patient Records </a>  <a href="Register.php" style="border:none;">REGISTER</a>
</div>

<div class="showData">

	<p  style="position:absolute;left:44%;top:29%;color:gray;z-index:-1;" id="noRec"><?php echo "$message";?></p>
	<table style="<?php echo "$hide"?>" id="patientRec">
		
		<?php 
				$i=0;
				
				while ($i<$row_count){
						
					$fname=mysql_result($result,$i,"first_name");
					$lname=mysql_result($result,$i,"last_name");
					$age=mysql_result($result,$i,"age");
					$dob=mysql_result($result,$i,"dob");
					$gender=mysql_result($result,$i,"gender");
					$contact=mysql_result($result,$i,"phone");
					$message=mysql_result($result,$i,"message");

?>
		<tr>
			<td><span></span></td>
			<td><?php echo $fname; ?> <?php echo $lname; ?><br><br><p style="color:#13bda1;font-weight:normal;"><?php echo $gender; ?></p></td>
			<td><label>Age : </label><?php echo $age ;?></td>
			<td><label>D.O.B : </label><?php echo $dob; ?></td>
			<td><label>Phone : </label><?php echo $contact; ?></td>
			<td><?php echo $message; ?></td>
		</tr>
		
		<?php 
		
			$i++;
			
			}
			
		?>

	</table>

</div>


<script>

$(document).ready(function(){

	$('.showData table tr td:nth-child(1) span').css({'padding':'18px 20px','font-size':'17px','border':'none','border-radius':'50%','background':'#13bda1','color':'white'});

	
	$('.showData table tr').each(function(){
		var n=$(this).find("td:nth-child(2)").html();
		$(this).find("td:nth-child(1) span").html(n.charAt(0).toUpperCase());

	});

});

//searching through tables
$("#srch").on("keyup", function() {
    var value = $(this).val();
	var value1=value.toUpperCase();
	var noData;

	
    $("table tr").each(function(index) {
      
        if (index !== -1) {

			noData=true;
            //row = $(this);
      		     
            var id = $(this).find("td:nth-child(2)").text().toUpperCase();

            if (id.indexOf(value1) !== 0) {
            	$(this).hide();       
            }
            else {
            	$(this).show();
            }
        }
        
    });

    if(noData==true){

		$('#noRec').text('No Match Found with "'+value+'"');
    }
    
});


</script>
</body>
</html>