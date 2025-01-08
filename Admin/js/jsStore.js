function specialPrint() {
	var content = $('#print').html();
	
	var newWindow = window.open('',content);
	newWindow.document.write("<html><head><title>BLUE CRESCENT SCHOOLS, SOKOTO</title><link rel='stylesheet' type='text/css' href='css/style.css'/><link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'/><style>body{background:none}</style></head><body>"+content+"</body></html>");
	newWindow.print();

}