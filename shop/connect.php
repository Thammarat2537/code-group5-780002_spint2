<?php
 /**
 * 
 */
 class connect
 {
    private $firstname = "";
    private $lastname = "";
    private $tel = "";
    private $mail = "";
    private $errors = array(); 

     function start()
     {
        session_start();
     } 

     function getConn(){
        $db = mysqli_connect("localhost","root","","shop") or die ("Connection failed: " . mysqli_connect_error()); 
        return $db;
     }

     function logRe(){
        $c = new connect();

        if(isset($_POST['signIn'])){
            $email = $_POST['mail'];
            $pass = $_POST['pass'];
            $email = stripcslashes($email);
            $pass = stripcslashes($pass);
            $email = mysqli_real_escape_string($c->getConn(),$email);
            $pass = mysqli_real_escape_string($c->getConn(),$pass);

            $sql = "SELECT * FROM user WHERE email = '$email' and pass ='$pass'";
            $result = mysqli_query($c->getConn(),$sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck < 1){
                echo '<script>alert("Incorrect Email or Password");window.location.href="login.php";</script>';
                exit();
            }
            else{
                if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['u_first'] = $row['fName'];
                    $_SESSION['u_last'] = $row['lName'];
                    header("Location: indexPage.php?login=success");
                    exit();
                } 
            }
        }

        if(isset($_POST['ENTER'])){
            $firstname = mysqli_real_escape_string($c->getConn(),$_POST['firstname']);
            $lastname = mysqli_real_escape_string($c->getConn(),$_POST['lastname']);
            $tel = mysqli_real_escape_string($c->getConn(),$_POST['tel']);
            $mail = mysqli_real_escape_string($c->getConn(),$_POST['mail']);
            $pass1 = mysqli_real_escape_string($c->getConn(),$_POST['pass1']);
            $pass2 = mysqli_real_escape_string($c->getConn(),$_POST['pass2']);
            
            if(empty($firstname) || empty($lastname)|| empty($tel)|| empty($mail)|| empty($pass1)|| empty($pass2)){
                $this->errors[]="";
            }
            else{
                if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[0-9]*$/", $tel)){  
                    $this->errors[]="";
                    echo '<script>alert("Invalid character")</script>';
                }
                else{
                    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
                        $this->errors[]="";
                        echo '<script>alert("Invalid Email")</script>';
                    }
                    else if($pass1 != $pass2){
                        $this->errors[]="";
                        echo '<script>alert("Passwords does not match")</script>';
                     }
                     $sql = "SELECT * FROM user WHERE email = '$mail'";
                     $result = mysqli_query($c->getConn(),$sql);
                     $check = mysqli_num_rows($result);

                     if($check > 0){
                         $this->errors[]="";
                         echo '<script>alert("User has been taken")</script>';
                     }
                }
            }

            if(count($this->errors) == 0){
                $pass = $pass1;
                $sql =  "INSERT INTO user (email,fName,lName,pass,pNum) VALUES ('$mail','$firstname','$lastname','$pass','$tel')";
                mysqli_query($c->getConn(),$sql);
                echo "<script>alert('Resgister Succesful');
                    window.location.href='login.php';
                </script>";
            }
        }
     }
 }
 ?>