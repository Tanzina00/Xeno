<?php 
	$host = 'localhost';
	$DBUser = "root";
	$DBPassword = '';
	$db = 'xeno';
	
	$conn = mysqli_connect($host,$DBUser, $DBPassword, $db);
	
	if(!$conn)
	{
		die(mysqli_error());
	}
	
?>