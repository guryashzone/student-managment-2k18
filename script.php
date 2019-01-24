<?php 
require( "connection.php" );

	if( isset( $_POST['s_id'] ) ){
		$id = $_POST['s_id'];
		$query = "DELETE FROM student_details WHERE student_id='$id'";
		$res = mysqli_query( $con,$query );
		if( $res ){
			echo "Deleted";
		}else{
			echo "not";
		}
	}

?>