<?php
	include 'connect.php';
	$con = new connect();
	$con->start();
	$con->logRe();
	
	if(isset($_POST['setOrder'])){
		$oID = $_SESSION['order_id'];
		$email = $_SESSION['email'];
		$sub = $_SESSION['sub'];
		$total = $_SESSION['total'];
		
		$id = mysqli_real_escape_string($con->getConn(),$oID);
		$user = mysqli_real_escape_string($con->getConn(),$email);
		$subtotal = mysqli_real_escape_string($con->getConn(),$sub);
		$grandtotal = mysqli_real_escape_string($con->getConn(),$total);
		
		$sql = "SELECT * FROM orderdetail WHERE orderID = '$id'";
		$run_query = mysqli_query($con->getConn(),$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo '<script>alert("ซ้ำ");</script>'; 
		}
		else{
			$sql = "INSERT INTO orderdetail (orderID,user,subtotal,grandtotal) VALUES ('$id','$user','$subtotal','$grandtotal')";
			mysqli_query($con->getConn(),$sql);	
			echo '<script>alert("Success");</script>'; 
		}
	}
?>
