<?php
function get_unique_filename($param = "", $ext = "")
	{
	$result =  uniqid() . "-" . date("Ymd") . "-" . $param . "-article";
	if($ext != "") $result .= "." . $ext;
	return $result;
	}
?>