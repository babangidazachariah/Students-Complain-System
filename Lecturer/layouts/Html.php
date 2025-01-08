<?php
class Html{
	public static function start($title){
		echo('

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>'.$title.'</title>

    <!-- Bootstrap Core CSS -->
    <link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bootstrap/dist/css/full-slider.css" rel="stylesheet">
    <link href="plugins/eternicode/dist/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <link href="plugins/material-design/bootstrap-material-design.css" rel="stylesheet">
    <link href="plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href="css/main.css" media="screen" rel="stylesheet">

<style type="text/css">
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
}
.style1 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 20px;
  color: #000;
  font-weight: bold;
}
.style2
{
  font-family:Georgia, "Times New Roman", Times, serif;
  font-size: 11px;
  font-weight:bold;
  color:#000;
}
.style3 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 11px;
}
.style4 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 11px;
}
.result{
   
   font-family:"Courier New", Courier, monospace;
   font-size:12px;
   font-weight:600;
   
   }
.name{ 
     
   font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
   font-size:12px;
   line-height: 20px;
   padding: 6px 30px 4px 10px;
   }
   .pass{ 
   
   border: #666 thick groove;
   border-radius: 6px;
   line-height: 20px;
   
   }
table.mystyle
{
  border-width: 0 0 1px 1px;
  border-spacing: 0;
  border-collapse: collapse;
  border-style: thin;
  text-align: left;
  border-color: #666;
  
}

.mystyle td, .mystyle th
{
    margin: 0;
    padding: 6px;
    border-width: 1px 1px 0 0;
    border-style: thin;
  border-color:#666666;
}
a {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 11px;
  color: #000;
}
a:link {
  text-decoration: none;
}
a:visited {
  text-decoration: none;
  color: #000;
}
a:hover {
  text-decoration: underline;
  color: #000;
}
a:active {
  text-decoration: none;
  color: #000;
}
</style>
</head>

<body>

');
	}

public static function end(){
echo('    <script src="plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="plugins/eternicode/dist/js/bootstrap-datepicker.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="plugins/timeago/moment.js"></script>
    <script src="plugins/timeago/livestamp.js"></script>
    <script src="plugins/timeago/timeago.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function(){
          jQuery("time.timeago").timeago();
      jQuery(".textarea").wysihtml5();

            });
  </script>
    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/signup.js"></script>
    <script>
    $(".carousel").carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
      $(function () {
        $("#example1").DataTable();
        $("#example2").DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>

</html>

	');
}

}
?>