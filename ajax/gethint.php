<?php
include('config.php');
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  if($q[0]!= 'S'){
    echo "Suggestions: Start with 'S'";    
  }else{
  $rest = substr($q, 1);
  if(is_numeric($rest) && strlen($rest) == 11){
       echo "";
    }
  else{
       echo "Suggestion: SYYYYMMDDXXX [Year-Month-Date-3_Digit]";
  }
  }

}
?>