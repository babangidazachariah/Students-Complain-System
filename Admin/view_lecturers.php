<?php
include 'includes/connection.php';
session_start();
	if(empty($_SESSION['admin'])){
		header("Location:login.php");
	}
	$search ="";
	if (isset($_POST['submit'])) {
		$searchKey = $_POST['searchKey'];
		$query = mysqli_query($db,"SELECT tblLecturer.*, tblInstitution.institutionName FROM tblLecturer, tblInstitution WHERE (tblLecturer.lecturerNumber = '$searchKey' OR tblLecturer.lecturerEmail = '$searchKey' OR tblLecturer.lecturerFirstName LIKE '%$searchKey%' OR tblLecturer.lecturerLastName LIKE '%$searchKey%') AND tblLecturer.lecturerSchool = tblInstitution.institutionID") or die(mysqli_error($db));
		   
		   if(mysqli_num_rows($query) > 0){
				while($row = mysqli_fetch_assoc($query)){
					$search .= "<tr>
						<td width='10%' >
							<font color='black' name='Arial' size='4'><b>
							".$row['lecturerTitle']."
							</b>
							</font>
						</td>
						<td width='35%'>
							<font color='black' name='Arial' size='4'><b>".
						
							$row['lecturerFirstName']." ". $row['lecturerLastName'] .
						"</b></font></td>
						<td width='30%'>
							<font color='black' name='Arial' size='4'><b>".
						
							$row['lecturerEmail'].
						"</b></font></td>
						<td width='30%'>
							<font color='black' name='Arial' size='4'><b>".
						
							$row['institutionName'].
						"</b></font></td>
					</tr>
					";
				}
		   }else{
				$search = "No Record Found";
		   }
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
						<div class="col-sm-12">
						<form action="view_lecturers.php" method="POST">
						
							<div class="col-sm-6">
								
								<input placeholder='Search Lecturer by ID, Name, or Email'  type="text" name="searchKey" class="form-control">
							</div>
							<div class="col-sm-6">
								
								<input type="submit" name="submit" value="Search" class="btn btn-success">
							</div>
						</form>
						<font color='black' name='Arial' size='4'><b>REGISTERED LECTURERS </b></font>
						</div>
                        <table width='100%' border='1' >
							<?php
								 if(!empty($search)){
									print($search);
								 }else{
										$query = mysqli_query($db,"SELECT tblLecturer.*, tblInstitution.institutionName FROM tblLecturer, tblInstitution WHERE tblLecturer.lecturerSchool = tblInstitution.institutionID") or die(mysqli_error($db));
									   
									   if(mysqli_num_rows($query) > 0){
											while($row = mysqli_fetch_assoc($query)){
												print("<tr>
													<td width='10%' >
														<font color='black' name='Arial' size='4'><b>
														".$row['lecturerTitle']."
														</b>
														</font>
													</td>
													<td width='35%'>
														<font color='black' name='Arial' size='4'><b>".
													
														$row['lecturerFirstName']." ". $row['lecturerLastName'] .
													"</b></font></td>
													<td width='30%'>
														<font color='black' name='Arial' size='4'><b>".
													
														$row['lecturerEmail'].
													"</b></font></td>
													<td width='30%'>
														<font color='black' name='Arial' size='4'><b>".
													
														$row['institutionName'].
													"</b></font></td>
												</tr>
												");
											}
									   }else{
											$message = "No Record Found";
									   }
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
