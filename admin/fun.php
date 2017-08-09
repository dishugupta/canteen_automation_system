<?php
function checkempty($a)
{
	$error=Array();
	foreach($a as $key=>$value)
	{
				if($value=="")
				{
				$error[$key]="please enter".$key;
				
				}
				
	}
		return $error;	
	

	/*if(empty($a))
	{
		return true;
	}
	else
	{
		
		return false;
	}*/
}
?>