<!DOCTYPE html>
<html>
<body>

<?php
$str = "V%BBB7e";
$pattern = "/[a-z]+/";
echo preg_match($pattern, $str);
$pattern = "/[A-Z]+/";
echo preg_match($pattern, $str);
$pattern = "/[0-9]+/";
echo preg_match($pattern, $str); 
$pattern = "/[@#!$%^&?]+/";
echo preg_match($pattern, $str);   
$arr = ['a', 'b'];
$str = "hello:";
foreach($arr as $item){
    $str .= ','.$item;
}
echo $str;
?>

</body>
</html>