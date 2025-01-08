<?php 

/**
*  Customs Class Created by Mustapha Nuhu Shehu of Bnetworks
*/
class Smurf
{
	
	public static function Upload($file, $dir)
	{
	 $alloyTypes=array("image/jpeg","image/gif","image/jpg","image/png");
		$picName=basename($_FILES[$file]['name']);	
		 $fileType=$_FILES[$file]['type'];
		 $tmpName=$_FILES[$file]['tmp_name'];
		 
	 if( in_array($fileType, $alloyTypes)){
		 		 
	   	 if(! file_exists($dir."/".$picName)){			
			 if( move_uploaded_file($tmpName,$dir."/".$picName)){
			  return  $filename=$dir."/".date('d_m_Y_').time('').'_'.$picName;
			  }
				else{ print "Error Occur While Uploading The File"; 
				}
				 
		}else{
				 if( move_uploaded_file($tmpName,$dir."/".date('d_m_Y_').time('').'_'.$picName))
				 {
				  return	$filename= $dir."/".date('d_m_Y_').time('').'_'.$picName;
				   }
				   else{ print "Error Occur While Uploading The File"; 
				   }
				 }
	 	 
	  }else{
	   return "Error File Uploaded Not Supported";
	 }
	}
}










 ?>