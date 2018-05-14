<?php	
	include 'connect.php';
	$con = new connect();
	$con->start();
	$con->logRe();
	
	
	if(isset($_POST['confirm'])){
		if($_FILES["fileToUpload"]["name"] != ""){
			$fp = fopen($_FILES["fileToUpload"]["tmp_name"],"r");
			$ReadBinary = fread($fp,filesize($_FILES["fileToUpload"]["tmp_name"]));
			fclose($fp);
			$FileData = addslashes($ReadBinary);
			
            $prod_name = $_POST['product-name'];
			$prod_id = $_POST['product-id'];
            $prod_categoty = $_POST['product-category'];
			$des = $_POST['description'];
			$price = $_POST['price'];
			
			$sql =  "INSERT INTO product (id,name,image,price,category,description) VALUES ('$prod_id','$prod_name','$FileData','$price','$prod_categoty','$des')";
			mysqli_query($con->getConn(),$sql);
			echo 'yess';
		}
		else{
			echo 'gg';
		}
	}
	
	if(isset($_POST['addtrack'])){
		$oID = $_POST["purchase-order"];
		$track = $_POST["track"];
		$query = "SELECT * FROM orderdetail WHERE orderID = '$oID' ";
		$run_query = mysqli_query($con->getConn(),$query);
		$count = mysqli_num_rows($run_query);
		
		if($count <= 0){
			echo '<script>alert("There is no order number '.$oID.'");</script>';                   
		}
		else {
			$sql = "INSERT INTO tracking (orderID,tracknum) VALUES ('$oID','$track')";
			mysqli_query($con->getConn(),$sql);
		}
	}
?>