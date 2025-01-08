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
		
		<script>
			function GetComplain(id){
				if(window.XMLHttpRequest)
				{
					
					//code for internet explorer 7 and above, Firefox, safari, opera, and Chrome
					xmlhttp =new XMLHttpRequest();
				}else
				{
					//code for intenet explorer 6 and bellow
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				//alert(id);
				xmlhttp.onreadystatechange = function()
				{
					
					if((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
					{
						//alert(xmlhttp.responseText);
						if(xmlhttp.responseText.length > 0){
							var details = xmlhttp.responseText.split("#"); 
							var complain = "<tr><td><font color='black' name='Arial' size='10'><b>" + details[0] +"</b></font></td></tr>";
							complain += "<tr><td><i>From: </i>" + details[1] +"<br /><i>Date:</i>"+ details[2] +"</td></tr>";
							complain += "<tr><td align='justify'>" + details[3] +"</td></tr>";
							complain += "<tr><td align='justify'><font color='black' name='Arial' size='10'><b>Response</b></font></td></tr>";
							complain += "<tr><td align='justify'>" + details[4] +"</td></tr>";
							document.getElementById("complainDetails").innerHTML =complain;
						}else{
							//Whatever is the response
						}
					}
				}
				//alert(routine);
				xmlhttp.open("GET", "../genFunctions.php?func=GetComplainDetails&id="+id,true);
				xmlhttp.send();
			
			}
		</script>
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
							<tr><td width='40%'>
							<table>
							<?php
								$query = mysqli_query($db,"SELECT * FROM tblComplaints WHERE complainStatus = 1 ORDER BY complainDate") or die(mysqli_error($db));
								$i = 0;
								if(mysqli_num_rows($query) > 0){
									while($row = mysqli_fetch_assoc($query)){
										if($i == 1){
											$i = 0;
											print("<tr ><td bgcolor='#D1D0CE' style='cursor:pointer'>
											<font color='black' name='Arial' size='4'><b onclick='Javascript:GetComplain(".$row['complainID'].");'>".$row['complainTitle'].
											"</b></font><br />".$row['complainSender']."</td></tr>");
										}else{
											$i = 1;
											print("<tr><td style='cursor:pointer'>
											<font color='black' name='Arial' size='4'><b onclick='Javascript:GetComplain(".$row['complainID'].");'>".$row['complainTitle'].
											"</b></font><br />".$row['complainSender']."</td></tr>");
										
										}
									}
								}
							?>
							</table>
							</td>
							<td width='60%' style='padding:10px'>
								<table id ='complainDetails'>
								
								</table>
							</td>
							</tr>
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
