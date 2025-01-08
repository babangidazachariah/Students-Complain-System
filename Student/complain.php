<?php
include 'includes/connection.php';
include 'includes/functions.php';
session_start();
	if(empty($_SESSION['student'])){
		header("Location:login.php");
	}
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
                <?php include "menu.php" ?>
                <div class="col-sm-12 thumbnail">
                <div class="col-sm-12 row text-justify">
                  <p></p>
                    <fieldset>
                    <?php 
						$message = "";
                        if (isset($_POST['submit'])) {
                            
                            $title = $_POST['title'];
                            $details = $_POST['details'];
							$date = date('Y-m-d');
							$sender = $_SESSION['student'];
                            if(empty($title) || empty($details)){
								$message = "Input Title and Details";
							}else{
							   $query = mysqli_query($db,"INSERT INTO tblComplaints (complainSender, complainTitle, complainBody, complainDate, complainStatus) 
							   VALUES('$sender', '$title', '$details', '$date', 0)") or die(mysqli_error($db));
							   
							   
								$message = "Complain Received. Check Back in Two Days";
							   
							}
                        }
                     ?>
                <legend><i class="fa fa-user-plus"></i> MAKE COMPLAIN</legend>
                <div class="col-sm-12">
                <form action="complain.php" method="POST">
					<div class="col-sm-12">
							<?php
								if(!empty($message)){
									print($message);
								}else{
								
								}
							?>
					</div>
                    <div class="col-sm-12">
                        Title
                        <input type="text" name="title" class="form-control">
                    </div>
                    
                    <div class="col-sm-12">
                        Details
                        <textarea name="details" class="form-control"></textarea>
                    </div>
                    
                    <div class="col-sm-6">
                        <br>
                        <input type="submit" name="submit" value="Send" class="btn btn-success">
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
