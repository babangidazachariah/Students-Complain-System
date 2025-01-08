<?php 

class Forms
{
  
  static function Login1 ($field1, $field2,$panel)
  {
    echo ' <div class="panel panel-'.$panel.'">
      <div class="panel-heading"><i class="fa fa-sign-in"></i> User Login</div>
      <div class="panel-body">
        <form method="POST" action="">
       <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user"></i></div>
        <span id="username"><input type="text" class="form-control" name="'.$field1.'" placeholder="Username"></span>
       </div>
        &nbsp;<br>
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
        <span id="password"><input class="form-control" type="password" name="'.$field2.'" placeholder="Password"></span>
       </div>
       <hr>
       
       <div class="col-lg-5" style="text-align:right">
          <button name="login" class="btn btn-raised btn-'.$panel.'">Login <i class="fa fa-sign-in"></i> </button>
       </div>
      </form>
      </div>
    </div>';
  }
  static function inputs($properties = array()){

          foreach ($properties as $prop) {
            echo"<div class='col-lg-6'>
            $prop[label]";
            if ($prop['isDisabled'] == true) {
            echo"<input type='$prop[type]' name='$prop[name]' id='$prop[id]' value='$prop[value]' placeholder='$prop[holder]' readonly class='form-control'></input>";
            }else{
        echo"<input type='$prop[type]' name='$prop[name]' id='$prop[id]' value='$prop[value]' placeholder='$prop[holder]' class='form-control'></input>";
      }
 echo"</div>";
          }
  }

static function area($att = array()){
  foreach ($att as $a) {
    echo "<div class='col-lg-12'>
      $a[label]
      <textarea name='$a[name]' rows='$a[rows]' id='$a[id]' class='form-control'></textarea>
   </div>";
  }
}
    static function select($options = array()){

        foreach ($options as $option) {
            echo"<div class='col-lg-6'>
                   $option[label]
                <select name='$option[name]' id='$option[id]' class='form-control'>";
            foreach ($option['option'] as $item) {
                echo" <option>$item</option>";
            }


            echo "</select></div>";
        }

    }
    static function  F_select($label,$name,$id,$fill){
        echo'<div class="colo-lg-6">'.$label.'
                    
                    <select name="'.$name.'" id="'.$id.'">'.$fill.'</select>
                </div>';
    }
    static function search_form(){
      echo('<div class="col col-md-3" style="margin-bottom:10px; margin-top:23px;">
            <input name="admNo" id="admNo" class="form-control" type="text" placeholder="Admission Number">
            </div>
            <div class="col col-md-3" style="margin-bottom:10px; margin-top:15px;">
            <input name="ftch" id="ftch" class="btn btn-raised btn-success" value="Search" type="button"></div>
        ');
    }



  static function time_login($panel, $name){
    echo('<div class="panel panel-'.$panel.'">
       <div class="panel-heading"><i class="fa fa-clock-o"></i> Time Login</div>
        <div class="panel-body">
        <form name="login-form" class="login-form" action="" method="post">
  
    <div class="header">
    <h1>TIME LOG</h1>
        
        <div>
<img src="img/dg8.gif" name="hr1"><img 
src="img/dg8.gif" name="hr2"><img 
src="img/dgc.gif"><img 
src="img/dg8.gif" name="mn1"><img 
src="img/dg8.gif" name="mn2"><img 
src="img/dgc.gif"><img 
src="img/dg8.gif" name="se1"><img 
src="img/dg8.gif" name="se2"><img 
src="img/dgam.gif" name="ampm"></div>

<script type="text/javascript">
// (c) 2000-2014 ricocheting.com
dg = new Array();
dg[0]=new Image();dg[0].src="img/dg0.gif";
dg[1]=new Image();dg[1].src="img/dg1.gif";
dg[2]=new Image();dg[2].src="img/dg2.gif";
dg[3]=new Image();dg[3].src="img/dg3.gif";
dg[4]=new Image();dg[4].src="img/dg4.gif";
dg[5]=new Image();dg[5].src="img/dg5.gif";
dg[6]=new Image();dg[6].src="img/dg6.gif";
dg[7]=new Image();dg[7].src="img/dg7.gif";
dg[8]=new Image();dg[8].src="img/dg8.gif";
dg[9]=new Image();dg[9].src="img/dg9.gif";
dgam=new Image();dgam.src="img/dgam.gif";
dgpm=new Image();dgpm.src="img/dgpm.gif";

function dotime(){ 
  var d=new Date();
  var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();

  // set AM or PM
  document.ampm.src=((hr<12)?dgam.src:dgpm.src);

  // adjust from 24hr clock
  if(hr==0){hr=12;}
  else if(hr>12){hr-=12;}

  document.hr1.src = getSrc(hr,10);
  document.hr2.src = getSrc(hr,1);
  document.mn1.src = getSrc(mn,10);
  document.mn2.src = getSrc(mn,1);
  document.se1.src = getSrc(se,10);
  document.se2.src = getSrc(se,1);
}

function getSrc(digit,index){
  return dg[(Math.floor(digit/index)%10)].src;
}

window.onload=function(){
  dotime();
  setInterval(dotime,1000);
}

</script>
        
   
        
        
    <p>&nbsp;</p>
        <span class="blink_text">PLEASE ENTER YOUR ID</span>
    
        
      </div>
  
    <div class="content">
         <input name="'.$name.'" type="text" class="form-control" value="" placeholder="User ID" autofocus required>
    <div class="user-icon"></div>
        
        
  </div>

    <div class="footer">
    <input type="submit" name="submit" value="ENTER" class="btn btn-raised btn-primary" />
    </div>
  
  </form>
        </div>
        </div>



      ');
  }
}




 ?>