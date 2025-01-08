<?php
include_once "connection.php";
class Sql {
	public static function Insert($table,$fields,$values) {
        global $db;
        $query = "INSERT INTO $table (".implode(',', $fields) .") VALUES(";
        for($i=0; $i<=count($values)-1; $i++) {
            if($i != count($values)-1) {
               $query .= "'%s',"; 
            }else {
               $query .= "'%s'";
            }
            
        }
        $query .= ")";
        $query = vsprintf($query,$values);
        $res = mysqli_query($db,$query) or die(mysqli_error());
    }
	
	public static function Update($table,$fields,$values,$whereFields,$whereValues) {
        global $db;
       $query = "UPDATE $table SET ";
        for($i=0; $i<=count($values)-1; $i++) {
        	if($i != count($values)-1) {
			   $query .= "$fields[$i]='%s', "; 
			}else {
			   $query .= "$fields[$i]='%s' ";
			}
			
        }
        $query .= " WHERE ";
        for($j=0; $j<=count($whereFields)-1; $j++) {
        	if($j !== count($whereValues)-1)
        		$query .= " $whereFields[$j]='%s' AND";  
        	else
        		$query .= " $whereValues[$j]='%s' ";  
        }
        $query = vsprintf($query,array_merge($values,$whereValues));
		$res = mysqli_query($db,$query) or die(mysqli_error());
		//$this->query = $query;
	}
	public static function SqlRows($table,$fields,$values) {
        global $db;
		$query = "SELECT * FROM $table WHERE ";
		for($i=0; $i<=count($values)-1; $i++) {
        	if($i != count($values)-1) 
        		$query .= " $fields[$i]='%s' AND ";
        	else
        		$query .= "  $fields[$i]='%s' ";
        }
        $query = vsprintf($query,$values);
        //echo $query;
        $res = mysqli_query($db,$query) or die(mysqli_error());
        return mysqli_num_rows($res);
        //$this->query = $query;
	}
   
    public static function Row($query) {
         global $db;
        $res = mysqli_query($db,$query) or die(mysqli_error());
        return mysqli_fetch_array($res);
    }
    
	public static function Select($table, $fields=array(), $values=array()){
		$query = count($fields) > 0 ? "SELECT * FROM $table WHERE " : "SELECT * FROM $table  " ;
		for($i=0; $i<=count($values)-1; $i++) {
        	if($i != count($values)-1) 
        		$query .= " $fields[$i]='%s' AND ";
        	else
        		$query .= "  $fields[$i]='%s' ";
        }
        $query = vsprintf($query,$values);

        return $query;
	}

    public static function FillSelect($query,$default) {
		global  $db;
        $res = mysqli_query($db,$query);
		echo "<option selected value='0'>$default</option>";
        while($row = mysqli_fetch_array($res)){
			echo "<option  value='$row[state_id]'>$row[state_name]</option>";

		}
    }
}
//mysqli::Insert("umar",array("d"),array("d"));
?>