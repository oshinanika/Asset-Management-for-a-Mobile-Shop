<?php
include('config.php');
$q = $_REQUEST["q"];

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $str = $q;
  $hint = "";
  if(strlen($str)<8) $hint = "Password length must me 8 or More";
  $pattern = "/[a-z]+/";
  if(!preg_match($pattern, $str)) {$hint =  "Add at least one lowercase latter";}
  $pattern = "/[A-Z]+/";
  if(!preg_match($pattern, $str)){$hint =  "Add at least one Uppercase latter";}
  $pattern = "/[0-9]+/";
  if(!preg_match($pattern, $str)){$hint =  "Add at least one Number"; } 
  $pattern = "/[@#!$%^&?]+/";
  if(!preg_match($pattern, $str)){$hint =  "Add at least one special character : @,!,#,$,%,^,?,&";} 
  

  echo $hint;

}
?>