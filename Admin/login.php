<?php
include 'includes/connection.php';
include 'includes/functions.php';
session_start();
?>
<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Student's Complain Support System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css" />
         <link rel="stylesheet" media="screen" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" media="screen" href="css/style.css">
    </head>
    <body>
        <div class="col-sm-10 col-sm-offset-1 thumbnail">
             <div class='col-sm-2' style=""><img width="1100" height="165" src="css/images/namelogo.png" /></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-12 thumbnail">
               <?php include 'loginMenu.php';?>
                <div class="col-sm-12 thumbnail">
                <div class="col-sm-12 row text-justify">
                  <p></p>
                    <fieldset>
                    <?php 
						$message = "";
                        if (isset($_POST['submit'])) {
                            
                            $email = $_POST['email'];
                            $pass = $_POST['password'];
                            if(empty($email) || empty($pass)){
								$message = "Input Email and Password";
							}else{
							   $query = mysqli_query($db,"SELECT * FROM tblAdmin WHERE adminEmail ='$email' AND adminPassword ='$pass'") or die(mysqli_error($db));
							   
							   if(mysqli_num_rows($query) > 0){
									$_SESSION['admin'] = "$email";
									header("Location:index.php");
							   }else{
									$message = "Incorrect Username or Password";
							   }
							}
                        }
                     ?>
                <legend><i class="fa fa-user-plus"></i> Admin Login</legend>
                <div class="col-sm-12">
                <form action="login.php" method="POST">
					<div class="col-sm-12">
							<?php
								if(!empty($message)){
									print($message);
								}else{
								
								}
							?>
					</div>
                    <div class="col-sm-12">
                        Email
                        <input type="text" name="email" class="form-control">
                    </div>
                    
                    <div class="col-sm-12">
                        Password
                        <input type="password" name="password" class="form-control">
                    </div>
                    
                    <div class="col-sm-6">
                       <a href='passwordRecovery.php'>Forgot Password? Click Here to Retrieve</a>
                    </div>
                   
                    <div class="col-sm-6">
                        <br>
                        <input type="submit" name="submit" value="Login" class="btn btn-success">
                    </div>
                </form>
                   
                </div>
                        
                        
                    </fieldset>
                  
                </div>
                </div>
                
                
                
                
                <div class="col-lg-12 text-center footer-style">
                    <hr style="border-bottom:#444 1px solid" />
                    Student Complain Support System<br/>
                    &copy; <?php echo date('Y'); ?> </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
