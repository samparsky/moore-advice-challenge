<?php

if(!empty($_POST)){
	$data = $_POST;
	Sendcurl($data,"http://localhost/");
}

function Sendcurl($url , $data)
{
	$handle = curl_init($url);
	curl_setopt($handle, CURLOPT_POST, $data);
	curl_setopt($handle,CURLOPT_POSTFIELDS, http_build_query($data));
	$value = curl_exec($handle);
	curl_close($handle);
	return $value;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Moore-Advice-Challenge</title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<div class="form-group">
		<input type="text" name="name" placeholder="Name" />
		<input type="text" placeholder="Level" />
		<button type="submit" class="btn btn-danger">Submit</button>
	</div>
	</form>
</body>
</html>