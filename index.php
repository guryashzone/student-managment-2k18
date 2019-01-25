<?php 
session_start();
if( !isset($_SESSION['login_id']) ){
	header('location:login.php');
}
require( "connection.php" );

if( isset( $_POST['submitBtn'] ) ){
	$name = addslashes($_POST['username']);
	$email = addslashes($_POST['useremail']);
	$roll = addslashes($_POST['userroll']);
	$address = addslashes($_POST['useraddress']);
	$file_name = $_FILES['userimage']['name'];
	$file_loc  = $_FILES['userimage']['tmp_name']; //size //type
	$loc = "student_images/".$file_name;
	move_uploaded_file($file_loc, "student_images/".$file_name);
	$query = "INSERT INTO student_details VALUES( NULL,'$name','$roll','$email','$address','$loc' )";
	$res  = mysqli_query( $con , $query );
	
	if( !$res ){
		$err = mysqli_error( $con );
		echo "<script>alert('$err')</script>";
	}else{
		echo "<script>alert('Student registration successful !')</script>";	
	}
}
if( isset( $_GET['updateBtn'] ) ){
	$id = addslashes($_GET['userid']);
	$name = addslashes($_GET['username']);
	$email = addslashes($_GET['useremail']);
	$roll = addslashes($_GET['userroll']);
	$address = addslashes($_GET['useraddress']);

	$query = "UPDATE student_details SET student_name='$name',student_roll='$roll',student_email='$email',student_address='$address' WHERE student_id='$id'";
	$res  = mysqli_query( $con , $query );
	
	if( !$res ){
		$err = mysqli_error( $con );
		echo "<script>alert('$err')</script>";
	}else{
		echo "<script>alert('Data updated successful !')</script>";	
	}
}
?>
<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta author="Avinash Kumar">
			<meta content="Student,managment">
			<title>Home | Student Managment</title>
			<link rel="stylesheet" href="libraries/w3.css">
			<script src="libraries/jq.js"></script>
		</head>
		<body>
			<div class="w3-bar w3-red">
				<div class="w3-bar-item w3-large">
					STUDENT MANAGMENT SYSTEM
				</div>
				<a href="logout.php" class="w3-bar-item w3-btn w3-right w3-padding w3-hover-white w3-hover-text-red">
					Logout
				</a>
				<div id="addBtn" class="w3-bar-item w3-btn w3-right w3-padding w3-hover-white w3-hover-text-red">
					+ STUDENT
				</div>
			</div>
			
			<div class="w3-row-padding">
				<div class="w3-col l2 m12 s12">
					<br>
				</div>
				<div class="w3-col l8 m12 s12">
					<div class="w3-margin-top">
						<div class="w3-red w3-large w3-center w3-padding">
							STUDENT DETAILS
						</div>
						<div>
							<table class="w3-table w3-hoverable">
								<tr class="">
									<th> Student image</th>
									<th> Student id</th>
									<th> Student roll</th>
									<th> Student name</th>
									<th> Student email </th>
									<th> Student address</th>
									<th> Delete</th>
								</tr>
								<?php 
									$query = "SELECT * FROM student_details";
									$res = mysqli_query( $con,$query );

									// Indexed array
									// $row  = mysqli_fetch_array( $res );

									// Associative array
									// $row  = mysqli_fetch_assoc( $res );

									// Fetch via object(best)
									while ($row  = mysqli_fetch_object( $res )){

										$data = json_encode( $row );

										echo "
											<tr class='student_row' data='$data'>
												<td> <img src='$row->image_location' class='w3-card-4 w3-circle' style='width:100px;height:100px'> </td>
												<td> $row->student_id </td>
												<td> $row->student_roll </td>
												<td> $row->student_name</td>
												<td> $row->student_email</td>
												<td> $row->student_address</td>
												<th class='w3-center'> <button class='w3-tiny w3-round-large w3-purple deleteStudent' id='$row->student_id'> Delete </button></th>
											</tr>

										";
									}
									// print_r($row);
								 ?>
							</table>
						</div>
					</div>
				</div>
				<div class="w3-col l2 m12 s12">
					<br>
				</div>
			</div>

			<div class="w3-modal" id="registarModal">
				<div class="w3-modal-content"  style="max-width:30%">
					<div class="w3-card-4">
						<div class="w3-card-4 w3-xlarge w3-red w3-center w3-wide w3-padding-large">
							REGISTER STUDENT
							<span class="w3-btn w3-right w3-hover-white w3-circle closeModal" style="margin-top:-9px" id=""> X </span>
						</div>
						<div class="w3-padding-large">
							<form action="" method="POST" enctype="multipart/form-data">
								<label>Student name : </label>
								<input type="text" name="username" class="w3-input" placeholder="Enter student name" required>
								<br>
								<label>Student roll : </label>
								<input type="number" name="userroll" class="w3-input" placeholder="Enter student roll" required>
								<br>
								<label>Student email : </label>
								<input type="email" name="useremail" class="w3-input" placeholder="Enter student email" required>
								<br>
								<label>Student address : </label>
								<textarea name="useraddress" style="width:100%" rows="5" required placeholder="Enter student address.."></textarea>
								<br>
								<label>Student image : </label>
								<input type="file" name="userimage" class="w3-input" accept="image/*" required>
								
								<br>
								<br>
								<input type="submit" name="submitBtn" class="w3-btn w3-red w3-round" value="Register">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="w3-modal" id="updateModal">
				<div class="w3-modal-content"  style="max-width:30%">
					<div class="w3-card-4">
						<div class="w3-card-4 w3-xlarge w3-green w3-center w3-wide w3-padding-large">
							UPDATE STUDENT
							<span class="w3-btn w3-right w3-hover-white w3-circle closeModal" style="margin-top:-9px" id=""> X </span>
						</div>
						<div class="w3-padding-large">
							<form action="" method="GET">
								<input type="hidden" name="userid" id="studentid">
								<label>Student name : </label>
								<input id="studentname" type="text" name="username" class="w3-input" placeholder="Enter student name" required>
								<br>
								<label>Student roll : </label>
								<input id="studentroll" type="number" name="userroll" class="w3-input" placeholder="Enter student roll" required>
								<br>
								<label>Student email : </label>
								<input id="studentemail" type="email" name="useremail" class="w3-input" placeholder="Enter student email" required>
								<br>
								<label>Student address : </label>
								<textarea id="studentaddress" name="useraddress" style="width:100%" rows="5" required placeholder="Enter student address.."></textarea>
								<br>
								<br>
								<input type="submit" name="updateBtn" class="w3-btn w3-red w3-round" value="Update">
							</form>
						</div>
					</div>
				</div>
			</div>
			<script>
				$(document).on("click",".student_row",function(){
					var data = $(this).attr("data");
					data = JSON.parse( data );
					$(this).addClass("w3-red");
					$("#studentname").val(data.student_name);
					$("#studentemail").val(data.student_email);
					$("#studentroll").val(data.student_roll);
					$("#studentaddress").val(data.student_address);
					$("#studentid").val(data.student_id);
					$("#updateModal").fadeIn();
				})

				$(document).on("click",".deleteStudent",function(e){
					e.stopPropagation();
					var sid = $(this).attr("id");
					$.ajax({
						url : "script.php",
						type :"POST",
						data : {
							s_id : sid
						},
						success : function( res ){
							if( res == "Deleted" )
							{
								alert("Student is deleted !");
								window.location.reload();
							}else{
								alert("Sorry ! Student not deleted !");
							}
						}
					});
				});
				$(document).on("click","#addBtn",function(){
					$("#registarModal").fadeIn();
				});

				$(document).on("mouseover","#closeModal",function(){
					$(this).addClass("w3-spin");
				});

				$(document).on("click",".closeModal",function(){
					$(".w3-modal").fadeOut();
				});

			</script>
		</body>
		</html>		