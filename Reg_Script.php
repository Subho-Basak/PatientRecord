<?php
include "./connect_db.inc";
$connection = db_connect();

if ( ! $connection )
{
	print( "cannot connect to database" );
	exit;
}

$fname=$_POST['fname'];
$fname=trim($fname);
$lname=$_POST['lname'];
$lname=trim($lname);
$a=$_POST['age'];
$age=(int)$a;
$dob=$_POST['dob'];
$phn=$_POST['phone'];
$phone=(double)$phn;
$sex=$_POST['sex'];
$message=$_POST['msg'];


$sql = "insert into patientregister(first_name,last_name,age,dob,gender,phone,message) values('$fname','$lname',$age,'$dob','$sex',$phone,'$message')";

$result=mysql_query($sql,$connection);

if($result)
{
	echo "true";

}
else{
	return false;
}

?>