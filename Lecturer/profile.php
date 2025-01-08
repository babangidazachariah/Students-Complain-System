<?php
include 'includes/connection.php';
session_start();
	if(empty($_SESSION['lecturer'])){
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
                        <table width='100%'>
							<?php
								$email = $_SESSION['lecturer'];
								$query = mysqli_query($db,"SELECT * FROM tblLecturer WHERE lecturerEmail ='$email'") or die(mysqli_error($db));
							   
							   if(mysqli_num_rows($query) > 0){
									while($row = mysqli_fetch_assoc($query)){
										print("<tr>
											<td width='40%' align='right'>
												<font color='black' name='Arial' size='10'><b>
												Name:
												</b>
												</font>
											</td>
											<td width='60%'>
												<font color='black' name='Arial' size='10'><b>".
											
												$row['lecturerFirstName']." ". $row['lecturerLastName'] .
											"</b></font></td>
										</tr>
										<tr>
											<td width='40%' align='right'>
												<font color='black' name='Arial' size='10'><b>Email:</b></font>
											</td>
											<td width='60%'>
												<font color='black' name='Arial' size='10'><b>".
												$row['lecturerEmail']."</b></font>
											</td>
										</tr>");
									}
							   }else{
									$message = "Incorrect Username or Password";
							   }
							
							?>
							
						</table>
                        
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
