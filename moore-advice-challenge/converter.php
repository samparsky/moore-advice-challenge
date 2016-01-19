<?php
	/**
	* 
	*/
	class Converter
	{
		function json_to_array($string)
		{
			$array = json_decode($string,true);
			return $array;
		}

		function array_to_json($array)
		{
			if(is_array($array))
			{
				$json = json_encode($array);
				return $json;
			} 
			else 
			{
				return false;
			}
		}
	}
?>