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
?>