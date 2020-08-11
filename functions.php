<?php 
	require('config.php');
	session_start();
	
if(isset($_POST['feed_submit']))
{
	$name 		= htmlentities(trim($_SESSION['first_name']),ENT_QUOTES);
	$msg 	= htmlentities(trim($_POST['feedback']),ENT_QUOTES);
			
	
	if(!empty($msg))
	{
	     
				$sqlInsert = "insert into feedback (name, msg) values('".$name."' , '".$msg."')";
				$rs = mysqli_query($conn, $sqlInsert);
				
				if($rs)
				{
					$successMsg = "Form has been saved successfully";
					header('location:dashboard.php');
					exit;

				}
				else
				{
					$errorMsg = "Unable to save user. Please try again";
				}
						
 
}
	else
	{
		$errorMsg = 'feedback didnt submitted';
	}
}
if(isset($_POST['f_submit']))
{
	
	$email 		= htmlentities(trim($_POST['email']),ENT_QUOTES);
	$password 	= htmlentities(trim($_POST['newpass']),ENT_QUOTES);
	$repass 	= htmlentities(trim($_POST['repass']),ENT_QUOTES);
	$selected_val = $_POST['user_as'];		
	
	if(!empty($email) && !empty($password) && strcmp($password,$repass)==0)
	{

			if(strcmp($selected_val,"driver")==0){
			$sql = "select * from driver where email = '".$email."'";
			
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			
			if($numRows == 1)
			{
				$options = array("cost"=>4);
				$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
				
				$sql = mysqli_query($conn,"UPDATE driver SET password=".$password." WHERE email=".$email);
               header('location:index.php');
				
				
 
			}
			
	}
	
	else if(strcmp($selected_val,"passenger")==0){
			$sql = "select * from passenger where email = '".$email."'";
			
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			
			if($numRows == 1)
			{
				$options = array("cost"=>4);
				$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
				
				$sql = mysqli_query($conn,"UPDATE passenger SET password=".$password." WHERE email=".$email);
               header('location:index.php');
				
				
 
			}
 
			}
			
	
}
	else
	{
		$errorMsg = 'Email or password does not exists';
	}
}
	
if(isset($_POST['r_submit']))
{
	$firstName 	= htmlentities(trim($_POST['fname']),ENT_QUOTES);
	$lastName 	= htmlentities(trim($_POST['lname']),ENT_QUOTES);
	$email 		= htmlentities(trim($_POST['email']),ENT_QUOTES);
	$phone 		= htmlentities(trim($_POST['phone']),ENT_QUOTES);
	$password 	= htmlentities(trim($_POST['pass']),ENT_QUOTES);
	$selected_val = $_POST['reg_as'];
			
	
	if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($password))
	{

			if(strcmp($selected_val,"driver")==0){
			$sql = "select * from driver where email = '".$email."'";
			
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			
			if($numRows == 0)
			{
				$options = array("cost"=>4);
				$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
				
				$sqlInsert = "insert into driver (first_name, last_name, email, phone, password) values('".$firstName."', '".$lastName."' , '".$email."', '".$phone."', '".$hashPassword."')";
				$rs = mysqli_query($conn, $sqlInsert);
				
				if($rs)
				{
					$successMsg = "Form has been saved successfully";
					header('location:index.php');
					exit;

				}
				else
				{
					$errorMsg = "Unable to save user. Please try again";
				}
				
 
			}
			else
			{
				$errorMsg = "User already exist";
			}
			
	}
	
	else if(strcmp($selected_val,"passenger")==0){
			$sql = "select * from passenger where email = '".$email."'";
			
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			
			if($numRows == 0)
			{
				$options = array("cost"=>4);
				$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
				
				$sqlInsert = "insert into passenger (first_name, last_name, email, phone, password) values('".$firstName."', '".$lastName."' , '".$email."', '".$phone."', '".$hashPassword."')";
				$rs = mysqli_query($conn, $sqlInsert);
				
				if($rs)
				{
					$successMsg = "Form has been saved successfully";
					header('location:index.php');
					exit;
				}
				else
				{
					$errorMsg = "Unable to save user. Please try again";
				}
				
 
			}
			else
			{
				$errorMsg = "User already exist";
			}
			
	}
}
	else
	{
		$errorMsg = 'All fields are required';
	}
}

	if(isset($_POST['l_submit']))
	{
		if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
		{
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			$selected_val = $_POST['log_as'];
			if(strcmp($selected_val,"driver")==0){
			$sqlEmail = "select * from driver where email = '".$email."'";
			$rs = mysqli_query($conn,$sqlEmail);
			$numRows = mysqli_num_rows($rs);
			
			if($numRows  == 1)
			{
				$row = mysqli_fetch_assoc($rs);
				
				if(password_verify($password,$row['password']))
				{
					$_SESSION['user_id'] = $row['d_id'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['phone'] = $row['phone'];
					header('location:drdashboard.php');
					exit;
					
				}
				else
				{
					$errorMsg =  "Wrong Email Or Password";
				}
			}
			else
			{
				$errorMsg =  "No User Found";
			}
		}
		if(strcmp($selected_val,"passenger")==0){
			$sqlEmail = "select * from passenger where email = '".$email."'";
			$rs = mysqli_query($conn,$sqlEmail);
			$numRows = mysqli_num_rows($rs);
			
			if($numRows  == 1)
			{
				$row = mysqli_fetch_assoc($rs);
				
				if(password_verify($password,$row['password']))
				{
					$_SESSION['user_id'] = $row['p_id'];
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];
					$_SESSION['email'] = $row['email'];
					
					header('location:dashboard.php');
					exit;
					
				}
				else
				{
					$errorMsg =  "Wrong Email Or Password";
				}
			}
			else
			{
				$errorMsg =  "No User Found";
			}
		}
		}
	}
	if(isset($_POST['status']))
	{
		$id 	= htmlentities(trim($_SESSION['user_id']),ENT_QUOTES);
$selected_val = $_POST['status_as'];
$_SESSION['status'] = $selected_val;
$sql = mysqli_query($conn,"UPDATE driver_info SET status=".$selected_val." WHERE d_id=".$id);
header('location:drdashboard.php');
	}

if(isset($_POST['pr_submit']))
{
	$id 	= htmlentities(trim($_SESSION['user_id']),ENT_QUOTES);
	$name 	= htmlentities(trim($_POST['name']),ENT_QUOTES);
	$email 	= htmlentities(trim($_POST['email']),ENT_QUOTES);
	$license = htmlentities(trim($_POST['license']),ENT_QUOTES);
	$phone 	= htmlentities(trim($_POST['phone']),ENT_QUOTES);
	$area 	= htmlentities(trim($_POST['area']),ENT_QUOTES);
	$selected_val = $_POST['status_as'];
			
	
	if(!empty($license) && !empty($area))
	{
			$sql = "select * from driver_info where email = '".$email."'";
			
			$result = mysqli_query($conn, $sql);
			$numRows = mysqli_num_rows($result);
			
			if($numRows == 0)
			{
				$sqlInsert = "insert into driver_info (d_id, license_no, name, area, status, phone) values('".$id."', '".$license."' , '".$name."', '".$area."', '".$selected_val."', '".$phone."')";
				$rs = mysqli_query($conn, $sqlInsert);
				
				if($rs)
				{
					$successMsg = "Form has been saved successfully";
					header('location:profile.php');
					exit;
				}
				else
				{
					$errorMsg = "Unable to save user. Please try again";
				}
				
 
			}
			else
			{
				$errorMsg = "User already exist";
			}
	
}
	else
	{
		$errorMsg = 'All fields are required';
	}
}	
?>