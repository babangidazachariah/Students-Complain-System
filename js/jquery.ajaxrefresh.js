/* Ajax Refresher
   *This file makes sure that operations take place without page refreshing
   *Version 2.4
   *Works with Gridview 2.2 or later
   Created By Umar Muhammad Muhammad Bello
   @Fawahirtech 
   @2014 
*/

function ajaxRefresh(pagename,sortCol,sortType,searchCol,searchVal,page) {	
	allParameters = new Array(sortCol,sortType,searchCol,searchVal,page);
	paramName = new Array('sortCol','sortType','searchCol','searchVal','page');
	var data = "";
	
	for(i=0; i <= allParameters.length-1; i++) {
		if(allParameters[i] !== '') {
			     data +="&"+paramName[i]+"="+allParameters[i];
		}
	}
	
	$.ajax({
		url:'ajaxRefresh.php',
		data: 'p='+pagename+data,
		type:'GET',
		success:function(r) {
			$('#tab').html(r);
		}
	})
}
