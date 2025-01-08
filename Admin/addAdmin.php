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
                <?php include "menu.php" ?>
                <div class="col-sm-12 thumbnail">
                <div class="col-sm-12 row text-justify">
                  <p></p>
                    <fieldset>
                    <?php 
                        if (isset($_POST['submit'])) {
                            
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            
                           $username = $_POST['email'];
						   
						   $school = $_POST['school'];
                           $password = ('123456');
                           $query = mysqli_query($db,"INSERT INTO `tblAdmin`(`adminFirstName`, `adminLastName`, `adminEmail`, `adminUsername`, `adminPassword`,`adminSchool`,`adminStatus`)
																			VALUES ('$firstname','$lastname','$username','$username','$password',$school, 1)") or die(mysqli_error($db));
                           success("Admin created, <a href='viewAdmin.php'>click here</a> to log in", 'col-sm-12');

                        }
                     ?>
                <legend><i class="fa fa-user-plus"></i> New Admin</legend>
                <div class="col-sm-12">
                <form action="addAdmin.php" method="POST">
                <div class="col-sm-6">
                       Institution
                        <select name="school" class="form-control">
                           <?php
							$query = mysqli_query($db,"SELECT * FROM tblInstitution") or die(mysqli_error($db));
							   
							   if(mysqli_num_rows($query) > 0){
									while($row = mysqli_fetch_assoc($query)){
										print("<option value='".$row['institutionID']."'>".$row['institutionName']."</option>");
									}
							   }
						   ?>
                        </select>
                        </div>
                    
                    <div class="col-sm-6">
                        First Name
                        <input type="text" name="firstname" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        Last Name
                        <input type="text" name="lastname" class="form-control">
                    </div>
                    
                    <div class="col-sm-6">
                        Email
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <br>
                        <input type="submit" name="submit" value="Register" class="btn btn-success">
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
