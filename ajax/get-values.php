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
        $sql= mysql_query("SELECT * from tbl_devicelist where model_name = '$q'");
        $row = mysql_fetch_array($sql);
        $result = "device_type:".$row['device_type']."#company:".$row['company']."#operating_system:".$row['operating_system']."#price:".$row['init_price'];
    }

    // Output "no suggestion" if no hint was found or output correct values
    echo $result;
?>