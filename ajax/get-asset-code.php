<?php
include('config.php');
$q = $_REQUEST["q"];

$asset_codes = "Please Selcet Asset";
$availability= "In Stock";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
      
  mysql_connect('localhost','root','') or die('cannot connect to the server');
  mysql_select_db('asset_ms_db') or die('cannot select database');
  
  if($q === 'Found') $availability = "Lost";
  else if($q === 'Received') $availability = "Borrowed";
  
  
  $sql = "SELECT asset_code, model_name FROM tbl_assetinfo where availability='$availability'";
  $result = mysql_query($sql);
  while ($row = mysql_fetch_array($result)) {
    $asset_codes .= ','.$row['asset_code'];
  }
  echo $asset_codes;
}
?>