<?php
include 'includes/connection.php';


	function GetComplainDetails($id, $db){
		
		$sql = "SELECT * FROM tblComplaints WHERE complainID = $id";
		//print($sql);
		$details ="";
		$query = mysqli_query($db, $sql) or print($db);//die(mysqli_error($db));
		//print($query);
		if(mysqli_num_rows($query) > 0){
			while($row = mysqli_fetch_assoc($query)){
				$details = $row['complainTitle']."#". $row['complainSender']."#".$row['complainDate']."#".$row['complainBody']."#".$row['complainComment']."#".$row['complainID'];
				
			}
		}
		return 	$details;
	}
	
	function Response($complainID, $details, $db){
		
		$query = mysqli_query($db,"UPDATE tblComplaints SET complainComment='$details', complainStatus = 1 WHERE complainID = $complainID");
		
		
	}
	if($_GET['func'] == "Response"){
	
		Response($_GET['id'], $_GET['details'], $db);
	}else if($_GET['func'] == "GetComplainDetails"){
	
		print(GetComplainDetails($_GET['id'], $db));
	}else{
		//print("Thus ". $_GET['func']." : ".$_GET['id']);
	}
?>