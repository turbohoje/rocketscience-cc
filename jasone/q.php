<?php 
$temp = "the date is " ;
echo longdate(time());

function longdate($timestamp)
{
$temp = "the date is ";
return $temp . date("l F jS Y", $timestamp);
}


?>
