<?php
include 'includes/connection.php';
include 'includes/functions.php';
session_start();
$id = $_GET['id'];

$query = mysqli_query($db,"SELECT * FROM complains WHERE complain_id ='$id'");
$fecth = mysqli_fetch_array($query);
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
                           $lecturer = $_POST['lecturer'];
                           $query2 = mysqli_query($db, "SELECT * FROM lecturers WHERE lecturer_id = '$lecturer'");
                           $row = mysqli_fetch_array($query2);
                           //print_r($row);
                           $msg = 'Hello Sir There is a New Complain Forwarded to You today Pls login and Check';
                           $phone = $row['phone'];
                           $query = mysqli_query($db,"UPDATE complains SET lecturer_id ='$lecturer' WHERE complain_id = '$id'");
                           sendSMS($phone,$msg);
                           success("Complain Forwarded Successfully", 'col-sm-12');

                        }
                     ?>
                <legend><i class="fa fa-share"></i> Forward Complain To Lecturer</legend>
                <div class="col-sm-12">
                <form action="" method="POST">
                <div class="col-sm-6">
                       Lecturer
                        <select name="lecturer" class="form-control">
                           <?php 
                           $query = mysqli_query($db, "SELECT * FROM lecturers");
                           while ($row = mysqli_fetch_array($query)) {
                                echo "<option value='".$row['lecturer_id']."'>".$row['title']." ".$row['firstname']." ".$row['lastname']."</option>";
                           }
                            ?>
                        </select>
                        </div>
                    <div class="col-sm-6">
                        Subject
                        <input type="text" name="subject" value="<?php echo $fecth['subject'] ?>" readonly class="form-control">
                    </div>
                    <div class="col-sm-12">
                        Complain
                        <textarea name="complain" readonly class="form-control"><?php echo nl2br($fecth['complain']); ?></textarea>
                    </div>
                    <div class="col-sm-6">
                        <br>
                        <input type="submit" name="submit" value="Forward Complain" class="btn btn-success">
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
