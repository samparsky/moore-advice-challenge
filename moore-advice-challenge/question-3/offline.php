<!DOCTYPE html>
<html>
<head>
	<title> Offline Check</title>
</head>
<body>

<form method="post" id="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
	<input type="name" class="form-control" name="name" id="name">
	<input type="number" name="age" id="age">
	<button type="submit" id="submit">Submit</button>
</form>

<script src="//cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.js"></script>
<script src="jquery.js"></script>
<script src="jStorage.js"></script>
<script src="offline.js"></script>
<script type="text/javascript">

$("#submit").click(function(e){
		
		e.preventDefault();

		var url  = "http://localhost:8081/stutern/moore-advice-challenge/question-3/process.php";
		
	    var ages  =  $("#age").val(); //get age value
	    var names = $("#name").val(); // get name value
	    
	    var offline = Offline.state;

	    //check connection if up else save to localstorage
	    if(offline == 'up'){
	    	$.ajax({
			          dataType: "JSON",
			          type: "POST",
			          url: url,
			          data: {
			          	'name' : names, 
			          	'age' : ages
			          },
			          success: function(result) {
			           		alert(result);
			          },
			          error: function(ts) {
			         		console.log(ts);
			          }
        		});
	    } else {

	    	$.jStorage.set('age', ages,0);
			$.jStorage.set('name', names,0);
			alert("You are offline. Saving your information to localstorage");

	    }
	});
</script>

</body>
</html>