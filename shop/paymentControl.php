<?php
	
	class paymentControl{
			
		public function setInfo(){
			include 'connect.php';
			$con = new connect();
			$con->start();
			$con->logRe();
			
			$fName = "";
			$lName = "";
			$tel = "";
			$address = "";
			$province = "";
			$zip = "";
			$note = "";
			$user_id = "";
			$order_id = "";
			$grandprice = "";
			$sub = "";
			$vat = "";
			
			if(isset($_POST['set'])){
			
				$fName = $_POST['fName'];
				$lName = $_POST['lName'];
				$tel = $_POST['tel'];
				$address = $_POST['address'];
				$province = $_POST['prov'];
				$zip = $_POST['zip'];
				$note = $_POST['note'];
				$user_id = $_SESSION["u_email"];
				$price = $_POST['grandtotal'];
				$sub = $_POST['getsub'];
				$vat = $_POST['gettax'];
				
				$firstname = mysqli_real_escape_string($con->getConn(),$fName);
				$lastname = mysqli_real_escape_string($con->getConn(),$lName);
				$telNo = mysqli_real_escape_string($con->getConn(),$tel);
				$addr = mysqli_real_escape_string($con->getConn(),$address);
				$provi = mysqli_real_escape_string($con->getConn(),$province);
				$zip = mysqli_real_escape_string($con->getConn(),$zip);
				$note = mysqli_real_escape_string($con->getConn(),$note);
				$user = mysqli_real_escape_string($con->getConn(),$user_id);
				$order_id++;
				
				$sql = "SELECT * FROM info WHERE order_id = '$order_id'";
				$run_query = mysqli_query($con->getConn(),$sql);
				$count = mysqli_num_rows($run_query);
				if($count > 0){
					while($row = mysqli_fetch_assoc($run_query)){	
						$order_id = $row['order_id'];
					}
						$order_id++;					
						$sql = "INSERT INTO info (user,fName,lName,tel,address,province,zipcode,note,order_id,total,vat,sub) VALUES ('$user','$firstname','$lastname','$telNo','$addr','$provi','$zip','$note','$order_id','$price','$vat','$sub')";
						mysqli_query($con->getConn(),$sql);
						
				}
				else{
					
					$sql = "INSERT INTO info (user,fName,lName,tel,address,province,zipcode,note,order_id,total,vat,sub) VALUES ('$user','$firstname','$lastname','$telNo','$addr','$provi','$zip','$note','$order_id','$price','$vat','$sub')";
					mysqli_query($con->getConn(),$sql);	
				}
				
				echo '<script>alert("Success");
						window.open("http://localhost/shop/order_confirm.php?", "_blank");
					</script>';
			}
		}
			
	}
?>