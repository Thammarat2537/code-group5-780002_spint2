<?php
	include_once 'paymentControl.php';
	$pay = new paymentControl();
	$pay->setInfo();
	$email = $_SESSION["u_email"];
	$totalprice = $_GET['totalprice'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V17</title>
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker_payment.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util_payment.css">
    <link rel="stylesheet" type="text/css" href="css/main1_payment.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            
			<form method="post" action="payment.php?totalprice=<?php echo $totalprice; ?>" class="login100-form validate-form">
		
                    <span class="login100-form-title p-b-34">
							รายละเอียดจัดส่ง
                    </span>
					<input type="hidden" name="grandtotal" value="<?php echo $totalprice; ?>">
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                        <input id="first-name" class="input100" type="text" name="fName" placeholder="firstname">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type lastname">
                        <input id="last-name" class="input100" type="text" name="lName" placeholder="lastname">
                        <span class="focus-input100"></span>
                    </div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type telephone">
                        <input id="tel" class="input100" type="text" name="tel" placeholder="telephone">
                        <span class="focus-input100"></span>
                    </div>
					<div class="wrap-input100 rs3-wrap-input100 validate-input m-b-20" data-validate="Type address">
                        <input id="ad" class="input100" type="text" name="address" placeholder="address">
                        <span class="focus-input100"></span>
                    </div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type province">
                        <input id="prov" class="input100" type="text" name="prov" placeholder="province">
                        <span class="focus-input100"></span>
                    </div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type Zip code">
                        <input id="zip" class="input100" type="text" name="zip" placeholder="Zip code">
                        <span class="focus-input100"></span>
                    </div>
					<div class="wrap-input100 rs3-wrap-input100 validate-input m-b-20" data-validate="Type note">
                        <input id="note" class="input100" type="text" name="note" placeholder="note">
                        <span class="focus-input100"></span>
                    </div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="set" id="save">SAVE</button>
					</div>
						
			</form>
			
			<form method="post" action="https://www.thaiepay.com/epaylink/payment.aspx" class="login100-form validate-form">
					<div class="container-login100-form-btn">
						<input type="hidden" name="refno" value="99999">
						<input type="hidden" name="merchantid" value="00000500">
						<input type="hidden" name="customeremail" value="<?php echo $email; ?>"> 
						<input type="hidden" name="productdetail" value="Testing Product">
						<input type="hidden" name="cc" value="00">
						<input type="hidden" name="returnurl" value="http://localhost/shop/indexPage.php">
						<input type="hidden" name="total" value="<?php echo $totalprice; ?>">
						<button type="hidden" class="login100-form-btn" name="yes" id="credit">PAYMENT</button>
					</div>
			</form>
			
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min_payment.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min_payment.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper_payment.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min_payment.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min_payment.js"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min_payment.js"></script>
    <script src="vendor/daterangepicker/daterangepicker_payment.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime_payment.js"></script>
    <!--===============================================================================================-->
    <script src="js/main1_payment.js"></script>

</body>
</html>