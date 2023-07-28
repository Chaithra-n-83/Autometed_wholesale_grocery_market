<?php
include  'config.php';

session_start();
$mode="enter_email";
if(isset($_GET['mode']))
{
    $mode=$_GET['mode'];
}
if(count($_POST)>0){
    switch ($mode) {
        case 'enter_email':
            # code...
            $email=$_POST['email'];
            $_SESSION['email']=$email;
            header("Location: foget.php?mode=enter_code");
            die; 
            break;
        case 'enter_code':
                # code...
                header("Location: foget.php?mode=enter_password");
                die; 
                break;
            case 'enter_password':
                    # code...
                    header("Location: login.php");
                    die;
                    break;
        
        default:
            # code...
            break;
    }
}

    //  function send_email($email){
    if($selected->send_email($email)){
    $expire = time()+(60*1);
    $code = rand(10000,99999);
    $email=addslashes($email);

    
    $query = "insert into forgotpass(email,code,expire) values('$email','$code','$expire')";
    mysqli_query($con,$query);
    //send email here
    mail($email,'website : reset password','your code is '.$code );
    
  }
  function is_code_correct($code){
    $code = addslashes($code);
    $expire=time();
    $email=addslashes( $_SESSION['email']);

     

    return false;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    

    <!-- font awesome cdn link -->
    <script src="https://kit.fontawesome.com/0f4ee99f39.js" crossorigin="anonymous"></script>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/components.css">

</head>
<body>

   
<?php
if(isset($message)){
    foreach($message as $message){

        echo '
        <div class="message">
           <span>'.$message.'</span>
           <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}

?>


<?php
        switch ($mode) {
            case 'enter_email':
                # code...

                ?>
                <section class="form-container">
       
              <form action="foget.php?mode=enter_email" enctype="multipart/form-data" method="post">
            <h3>forgot password</h3>
             <h1><B>Enter your mail below</B></h1>
            

            <input type="email" name="email" class="box" placeholder="enter your email" required >

        
            <!-- <input type="password" name="pass" class="box" placeholder="enter your password" required> -->
            
            <input type="submit" value="next" class="btn" name="submit">
         <p>   <a href="login.php">Login</a></p>
            <!-- <p><a href="login.php">login</a></p> -->
        </form>
    </section>
    ?>
    <?php
                break;
            case 'enter_code':
                    # code...
                    ?>
                    <section class="form-container">
           
                  <form action="foget.php?mode=enter_code" enctype="multipart/form-data" method="post">
                <h3>forgot password </h3>
                <h1><b>Enter your code sent to your email </b></h1>
                
                <input type="text" name="code" class="box" placeholder="12345" required >
    
            
                <!-- <input type="password" name="pass" class="box" placeholder="enter your password" required> -->
                
                <input type="submit" value="next" class="btn" name="submit" style="float:right;">
                <a href="foget.php">
                    <input type="button" value="Start Over"> 
                </a>
             <p>   <a href="login.php">Login</a></p>
                <!-- <p>don't have an account? <a href="register.php">register now</a></p> -->
            </form>
        </section>
        <?php
                    break;
                case 'enter_password':
                        # code...
                        ?>
                    <section class="form-container">
           
                  <form action="foget.php?mode=enter_password" enctype="multipart/form-data" method="post">
                <h3>forgot password </h3>
                <h1><b>Enter your new password </b></h1>
                
                <input type="password" name="password" class="box" placeholder="password" required >
                <input type="password" name="password2" class="box" placeholder="renter-password" required >
    
            
                <!-- <input type="password" name="pass" class="box" placeholder="enter your password" required> -->
                
                <input type="submit" value="next" class="btn" name="submit" style="float:right;">
                <a href="foget.php">
                    <input type="button" value="Start Over" > 
                </a>
             <p>   <a href="login.php">Login</a></p>
                <!-- <p>don't have an account? <a href="register.php">register now</a></p> -->
            </form>
        </section>
        <?php
                        break;
            
            default:
                # code...
                break;
        }
        ?>
    
    
</body>
</html>