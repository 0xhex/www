
<span id="responce">
<input style="float:center; margin-left:12px" onclick="createTables();" type="submit" value="Create Tables">
<p>
</span>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
function createTables() {
	$.ajax({ url: 'ajaxCalls/createTables.php',
			 type: 'post',
			 success: function(output) {
						  alert("Tables are created!");
						  document.getElementById('responce').innerHTML ='<input style="float:center; margin-left:12px" onclick="createTables();" type="submit" value="Create Tables">';
						  document.getElementById('responce').innerHTML +='<p>';
						  document.getElementById('responce').innerHTML +='<input style="float:center; margin-left:12px" onclick="insertValues();" type="submit" value="Insert Data">';

					  }
	});


}

function insertValues() {
	$.ajax({ url: 'ajaxCalls/insertData.php',
			 type: 'post',
			 success: function(output) {
						  alert("Tables are filled!");
						  window.location = "http://localhost/mainPage.php";
					  }
	});


}

</script>