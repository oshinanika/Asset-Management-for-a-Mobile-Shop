<?php
ob_start();
session_start();
if($_SESSION['name']!='ams')
{
	header('location: ../login.php');
}
?>

<?php
    include('../config.php');
    $q = $_REQUEST["q"];

    $result = "";

    // lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $sql = mysql_query("SELECT* FROM tbl_assetinfo INNER JOIN tbl_devicelist ON tbl_assetinfo.model_name = tbl_devicelist.model_name where asset_code = '$q'");			
		$row=mysql_fetch_array($sql);
        $result = $row['device_type'].",".$row['company'].",".$row['model_name'];
    }

    // Output "no suggestion" if no hint was found or output correct values
    echo $result;
?>