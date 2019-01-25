<?php
session_start();
if( isset($_SESSION['login_id']) ){
	header('location:index.php');
}
require('connection.php');
 if( isset( $_POST['submitBtn'] ) ){
	$id = addslashes($_POST['adminid']);
	$pwd = addslashes($_POST['password']);
	
	$query = "SELECT * FROM admin_login_details WHERE admin_id='$id' && admin_password='$pwd'";
	$res  = mysqli_query( $con , $query );
	//How many records
	$nrows = mysqli_num_rows( $res );
	$row = mysqli_fetch_object( $res );

	if( $nrows == 1 ){
		echo "<script>alert('Login succesfull')</script>";
		$_SESSION['login_id'] = $id;
		$_SESSION['login_name'] = $row->admin_name;
		header('location:index.php');
	}else{
		echo "<script>alert('Login failed !')</script>";	
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="libraries/w3.css">
	<script src="libraries/jq.js"></script>
</head>
<body>
	
	
					<div class="w3-card-4">
						<div class="w3-card-4 w3-xlarge w3-red w3-center w3-wide w3-padding-large">
							LOGIN ADMIN
							<span class="w3-btn w3-right w3-hover-white w3-circle closeModal" style="margin-top:-9px" id=""> X </span>
						</div>
						<div class="w3-padding-large">
							<form action="" method="POST">
								<label>Admin id : </label>
								<input type="text" name="adminid" class="w3-input" placeholder="Enter admin id" required>
								<br>
								<label>Admin password : </label>
								<input type="password" name="password" class="w3-input" placeholder="Enter admin password" required>
								<br>		
								<input type="submit" name="submitBtn" class="w3-btn w3-red w3-round" value="Login">
							</form>
						</div>
					</div>
</body>
</html>