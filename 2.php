<!-- Create a function in PHP to floor decimal numbers with any provided precision.  -->
<!-- Example: convert(2.99999,2), convert(199.99999,4)  -->
<?php
function convert(float $num, int $precision) {
$temp_num=explode(".", $num);
$temp_num[1]=substr_replace($temp_num[1],".",$precision,0);
if($temp_num[0]>=0) {
$temp_num[1]=floor($temp_num[1]);
} else {
$temp_num[1]=ceil($temp_num[1]);
}
$result2B= array($temp_num[0],$temp_num[1]);
return implode(".",$result2B);
}
echo convert(111.1111119999,6);
echo convert(-111.1111119999,6);
?>
