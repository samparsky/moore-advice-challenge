<?php
require("db.php");

	if(!empty($_POST)){
		var_dump($_POST);
		$name = $_POST['name'];
		$age  = $_POST['age'];
		$error = [];
		if(empty($name)) $error['name'] = "Please enter a valid name";
		if(empty($age))  $error['age']  = 'Please enter a valid age';

		if(empty($error)){
			$db = Database::getInstance();
			$result = $db->Dbinsert($name,$age);
			if($result){
				return json_encode("succes");
			}
		}
	}
?>