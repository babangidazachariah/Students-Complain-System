<?php
include 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Student Complain Support System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css" />
         <link rel="stylesheet" media="screen" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" media="screen" href="css/style.css">
    </head>
    <body>
        <div class="col-sm-10 col-sm-offset-1 thumbnail">
            <div class='col-sm-2' style="margin-left: 0.0%;"><img src="css/images/namelogo.png" /></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-12 thumbnail">
                <?php include "menu.php" ?>
                <div class="col-sm-12 thumbnail">
                <div class="col-sm-12 row text-justify">
                  <p></p>
                    <fieldset>
                       <legend>About Us</legend>
                       Ahmadu Bello University, Zaria was established by his Excellency Alhaji Shehu Shagari
                     out of the desire to improve access to higher education for its citizens.
                     <br><span style="font-size: 11pt; font-family: verdana,geneva;">
                     The Computer Science Unit of Ahmadu Bello University, Zaria was established in early 90s               
                     under the department of mathematics, faculty of science. It started with a few number of students,
                     but since the number of students admitted into the unit is exponentially increasing each and every year.
                     As the number of students increases, however, there is compelling need for the students to have support
                     services that will help them in their academic endeavors. As it is well known that in any learning 
                     institution, students are in need of support services such as information concerning lecture schedule, 
                     assignment, test, exams, presentation and continued interaction between students and staffs on 24/7 basis.
                     Some of the students in some cases may personally lodge their complaints to either the lecturer or to someone
                     else, while some students may decide to leave their complaints due to either lack of access to the lecturers 
                     or in fear of intimidation. The Computer Science Unit of Ahmadu Bello University, Zaria is not an exception,
                     as many students have issues with regard to results, which the students have to lodge to the lecturers from time to time.
                     </span>
                        
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
