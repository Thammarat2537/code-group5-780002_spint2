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
				$order_id = 00000;
				
				$firstname = mysqli_real_escape_string($con->getConn(),$fName);
				$lastname = mysqli_real_escape_string($con->getConn(),$lName);
				$telNo = mysqli_real_escape_string($con->getConn(),$tel);
				$addr = mysqli_real_escape_string($con->getConn(),$address);
				$provi = mysqli_real_escape_string($con->getConn(),$province);
				$zip = mysqli_real_escape_string($con->getConn(),$zip);
				$note = mysqli_real_escape_string($con->getConn(),$note);
				$user = mysqli_real_escape_string($con->getConn(),$user_id);
				
				$sql =  "INSERT INTO info (user,fName,lName,tel,address,province,zipcode,note) VALUES ('$user','$firstname','$lastname','$telNo','$addr','$provi','$zip','$note')";
				
				mysqli_query($con->getConn(),$sql);
				
				echo '<script>alert("Info Save Succesful");
						window.open("http://localhost/shop/indexPage.php", "_blank");
					</script>';
			}
		}
			
	}
?>