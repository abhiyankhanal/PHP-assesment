<!-- Create a function in PHP to floor decimal numbers with any provided precision.  -->
<!-- Example: convert(2.99999,2), convert(199.99999,4)  -->
<?php
function convert(float $num, int $precision) {
  $result = round($num, $precision, PHP_ROUND_HALF_DOWN);
  return $result;
}
echo convert(3.010101555,7)
?>