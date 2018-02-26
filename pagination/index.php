<HTML>
<HEAD>
<TITLE>jQuery AJAX Pagination</TITLE>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val()},
		success: function(data){
		$("#pagination").html(data);
		},
		error: function() 
		{} 	        
   });
}
</script>
</HEAD>
<BODY>
<div id="pagination">
<input type="hidden" name="rowcount" id="rowcount" />
</div>
<script>
getresult("getresult.php");
</script>
</BODY>
</HTML>
