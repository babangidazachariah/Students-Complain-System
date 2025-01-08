<?php
@include "PHPMailerAutoload.php";
error_reporting(0);
//sendMail('umarmuhammadbello@gmail.com','dd','aa');
function csvDecode($filename) {
   $keys = NULL;
   $data = array();
   if($handle = fopen($filename, "r")) {
     while($row = fgetcsv($handle, 100000, ',')) {
       if(!$keys) {
         $keys = $row;
       } else {
         $data[] = array_combine($keys, $row);
       }
     }
   }
   return $data;
 }

 function sIA($field1,$field2) {
  if(!empty($field1))
    echo $field1;
  elseif(!empty($field2))
    echo $field2;
 }

 function getMyClass($username) {
   $query = MySql::Select('form_master INNER JOIN sub_class USING(sub_class_id)
                INNER JOIN class USING(class_id)',array('staff_id'),array(clean($username)));
   $myclass = array();
     $row = MySql::Row($query);
       $myclass[] = $row['sub_class_id'].'?'.$row['class_name'].'?'.$row['sub_class_name'];

    return $myclass;
 }

 function nextClass($current_class) {
  $classes = array("BASIC 1","BASIC 2","BASIC 3","BASIC 4","BASIC 5","BASIC 6","JSS1","JSS2","JSS3","SS1","SS2","SS3");
  $i = -1;
  foreach($classes as $class) {
    $i++;
    if($class == $current_class)
      break;
  }
  $index = $i;
  $nextClass = @$classes[$i+1];
  return $nextClass;
 }

 //echo nextClass("PRIMARY 6");

 function currents($username='') {
    if(!empty($username)) {
       $query = mysql_query("SELECT * FROM current_session 
                            INNER JOIN staff USING(admin_id)
                            INNER JOIN staff_login USING(staff_id) 
                            WHERE staff_login.username='$username'
                            ORDER BY id DESC");
     } else {
         $query = mysql_query("SELECT * FROM current_session 
                           
                            ORDER BY id DESC");
     }
     $row = mysql_fetch_array($query);
     return array($row['session'],$row['term'],$row['begin_date']);
 }

 function getFmSection($username) {
  $query = sprintf("SELECT section_name,section.section_id
                      FROM staff_login INNER JOIN  staff USING(staff_id)
                      INNER JOIN admin USING(admin_id)
                      INNER JOIN section USING(section_id)
                      WHERE staff_login.username='%s'
                ",$username);
  $res = mysql_query($query) or die(mysql_error());
  $row = mysql_fetch_array($res);
  return array($row['section_name'],$row['section_id']);
 }
 
 function isAvailable($username,$eventName) {
  $query = sprintf("SELECT admin_id FROM 
                 staff INNER JOIN 
                 staff_login USING(staff_id)
                 WHERE username='%s'",$username);
  
  $res = mysql_query($query) or die(mysql_error());
  $row = mysql_fetch_array($res);
  $query2 = sprintf("SELECT start_date, duration FROM event_time WHERE admin_id=%d AND event_name='%s'",
                  $row['admin_id'],$eventName);
  $res2 = mysql_query($query2) or die(mysql_error());
  $row2 = mysql_fetch_array($res2);
  $begin = strtotime($row2['start_date']);
  $end = $begin + ($row2['duration']*24*60*60);
  $now = time();
    if($now >= $begin && $now <= $end)
      return true;
    else
      return false;
 }
 function selected($page=array()) {
  if(count($page)==0) {
    $page = $_SERVER['PHP_SELF'];
    $page[0] = null;
    $page =  stristr($page,'/',false);
    $page[0] = null;
  }
 }



 function randChar() {
  $string = "";
  $chars = "ABCDEF123456789ZRSTUV";
  for($i=0;$i<=11;$i++) {
       $string .= $chars[mt_rand(0,strlen($chars)-1)];
  }
  return $string;
 }
function checkField($f) {
 
  if($_GET['sortCol']==$f && $_GET['sortType'] == "DESC") {
    echo "<i class='fa fa-sort-alpha-asc'></i>  ";
  }elseif($_GET['sortCol']==$f && $_GET['sortType'] == "ASC") {
    echo "<i class='fa fa-sort-alpha-desc'></i> ";
  }
 }
 function pagination($query,$s,$perpage=10,$curPage) {
  $page = (isset($_GET['page']) || !empty($_GET['page'])) ? $_GET['page'] : 1;
  
  $begin = (($page-1)  * $perpage);
  $begin = ($begin == 0) ? 0 : $begin;
  $modquery = $query . " LIMIT $begin, $perpage";
  $res = mysql_query($query) or die(mysql_error());
  $total = @mysql_num_rows($res);
  $pages = ceil($total/$perpage);
  $links = "<ul class='pagination'>";
  for($i = 1; $i <= $pages; $i++) {
    if($i != $page) {
       $links .= "<li><a href='";
         $links .= "javascript:ajaxRefresh(";          
         $links .= '"'.$curPage.'",'.'"'.$_GET['sortCol'].'",'.'"'. $_GET['sortType'].'",'
                .'"'.$_GET['searchCol'].'",'.'"'.$_GET['searchVal'].'",'.'"'.$i.'"';
         $links .= ")";
         $links .= "'>$i</a></li>";
    }else
      $links .= "<li class='active'><a>$i</a></li>";
  }
  $links .= "</ul>";
  //echo $modquery;
  return array(
      'query' => $modquery,
      'total' => $total,
      'links' => $links,
      'pages' => $pages,
      'begin' => $begin
  );
 }
 
 function error($message) {
   echo "<div class='col-lg-12 alert alert-danger' style='padding:10px'><i class='fa fa-warning'></i> $message</div>";
 }


 function errorArray($message) {
   echo "<div class='col-lg-12 alert alert-danger' style='padding:10px'><i class='fa fa-warning'></i>";
   echo "<b> The following error(s) occured.</b><ol>";
   foreach($message as $m)
     echo "- ".$m."<br/>";
   echo "</ol>";
   echo "</div>";
 }
 function sendSMS($phone,$message) {
   $url = "http://smsclone.com/index.php?option=com_spc&comm=spc_api";
     $url .= "&username=ABDUGUSAU";
      $url .= "&password=gusau";
     $url .= "&sender=Complain";
     $url .= "&recipient=$phone";
     $url .= "&message=".urlencode($message);
     $fp = @fopen($url, "r",255);
 } 
 /*function sendSMS($phone,$message) {
    $owneremail="muhdk102@gmail.com";
    $subacct="RES_NOTIFY"; 
    $subacctpwd="123456"; 
    $sendto=$phone;  
    $sender="RES_NOTIFY";     
       
    $url = "http://www.alertng.com/components/com_smsreseller/smsapi.php";
    $url .= "?username=umar";
    $url .= "&password=123456";
    $url .= "&sender=RESULTNO";
    $url .= "&recipient=".urlencode($phone);
    $url .= "&message=".urlencode($message);
    echo $url;
    $fp = pfopen($url);
 }*/

 function pfopen($url) {
     
     
    $proxy_server = "127.0.0.1";
    $proxy_port = 8080;
 
 
    if (substr($url, 0,7) <> 'http://') {
        return false;
    }
 
 
    $proxycon = fsockopen($proxy_server, $proxy_port, $errno, $errstr);
 
 
 
    fputs($proxycon,"GET ".$url." HTTP/1.0 \r\n\r\n");
 
    $reading_headers = true;
    while (!feof ($proxycon)) {
        $curline = fgets($proxycon, 4096);
 
        if ($curline=="\r\n") {
            $reading_headers = false;
        }
        if (!$reading_headers) {
            @$filecontent .= $curline;
        }
    }
 
    fclose($proxycon);
    return $filecontent;
 
 
}
 function sendMail($to,$subject,$message) {
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPSecure = 'ssl';
  $mail->SMTPAuth = true;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;
  $mail->Username = "bakale.mahmud@gmail.com";
  $mail->Password = "bakale123";
  $mail->setFrom('resultnotification@gmail.com', 'RESULT NOTIFICATION');
  $mail->addReplyTo('resultnotification@gmail.com', 'RESULT NOTIFICATION');
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body =$message;
  if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
     return true;
  }
 }

 function success($message) {
   echo "<div class='col-lg-12 alert alert-success' style='padding:10px'><i class='fa fa-information'></i> $message</div>";
 }
 
 function clean($str) {
   return mysql_real_escape_string(addslashes(trim($str)));
 }
?>