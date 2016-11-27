<?php
$dbhost = 'localhost';
$dbusername ='root';
$dbuserpassword = '';
$default_dbname = 'mysql';
$dbname = 'Patient_info';

$MYSQL_ERRNO ='';
$MYSQL_ERROR ='';

function db_connect()
{
	global $dbhost, $dbusername, $dbuserpassword, $default_dbname, $dbname, $MYSQL_ERRNO, $MYSQL_ERROR;
	
	$link_id = mysql_connect("$dbhost","$dbusername","$dbuserpassword");
	if (!$link_id)
	{
		$MYSQL_ERRNO = 0;
		$MYSQL_ERROR = "Connection Fail to the host $dbhost.";
	}
	else if(empty($dbname) && !mysql_select_db($default_dbname))
	{
		$MYSQL_ERRNO = mysql_errno();
		$MYSQL_ERROR = mysql_error();
		return 0;
	}
	else if(!empty($dbname) && !mysql_select_db($dbname))
	{
		$MYSQL_ERRNO = mysql_errno();
		$MYSQL_ERROR = mysql_error();
		return 0;
	}
	else return $link_id;
}




function sql_error()
{
	global $MYSQL_ERRNO, $MYSQL_ERROR;
	if(empty($MYSQL_ERROR))
	{
		$MYSQL_ERRNO = mysql_erron();
		$MYSQL_ERROR = mysql_error();
	}
	return "$MYSQL_ERRNO : $MYSQL_ERROR";
}
?>