<?php 


class Navs
{
	
	static function Nice1 ($links =array())
	{
		echo' <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
       <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class=" nav navbar-brand" href="Myfiles.php" ><img src="images/logo.png" width="100" height="40" /></a>
            </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">';

            foreach($links as $link) {

            	 echo "<li><a href='$link[location]'> <i class='$link[icon]'></i> $link[title] </a></li>";
            }
               
            echo '</ul>
        </div>
    </div>
</div>';
	}

	static function Nice2($links = array()){
		echo ' <div class="nav navbar-static-top navbar-default" style="border:#eee 1px solid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
           <a href="#"><i class="glyphicon glyphicon-align-justify"></i></a>
         </button>
      </div>
      <div class="navbar-collapse collapse">
       <ul class="nav navbar-nav" >';
       foreach ($links as $link) {
       		echo "<li><a href='$link[location]'><i class='$link[icon]'></i> $link[title] </a></li>";
       }
        
     echo '</ul>
      </div>

   </div>';
	}

	static function Nice3($links = array()){
	echo'<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">';
        foreach ($links as $link) {
        	echo "<li><a href='$link[location]'><i class='$link[icon]'></i> $link[title] </a></li>";
        }
     echo '</ul>
    </div>
  </div>
</nav>';
	}

  static function Nice4($links = array()){
  echo'<nav id="menubar" class= "navbar navbar-inverse container" style="width: 100%">
    <ul class="nav navbar-nav">';
     foreach ($links as $link) {
          echo "<li><a href='$link[location]'><i class='$link[icon]'></i> $link[title] </a></li>";
        }

   echo '</ul>
  </nav>';
  }
static function Nice5 ($links = array()){
  echo ' <div class="nav navbar-static-top navbar-default" id="mynav" style="margin-right:17px; border-radius:7px; background: #E6E6FA;" >
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          
         </button>
      </div>
      <div class="navbar-collapse collapse">
       <ul class="nav navbar-nav">';
        foreach ($links as $link) {
          if(!is_array(@$link['dropdown']))
              echo "<li><a href='$link[location]'><i class='$link[icon]'></i> $link[title] </a></li>";
          else {
             echo'<li class="dropdown"><a data-toggle="dropdown" href="#"><i class="fa fa-files-o"></i> Results<i class="caret"></i></a>
          <ul class="dropdown-menu">';
               foreach($link['drowpdown'] as $drowpdown) {
                   echo "<li><a href='$drowpdown[location]'><i class='$drowpdown[icon]'></i> $drowpdown[title] </a></li>";
               }
          echo '</ul>
      </li>';
          }
        }
        echo'</ul>
      </div>
    </div>';
}

}


 ?>