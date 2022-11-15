<!-- 1. Write a code, using listed PHP functions, with example 
a. is_int() 
b. is_numeric() 
c. is_integer()  -->

<?php
//test variables here
$var = array(1,"4","five",32.5);
for($i=0; $i < count($var); $i++){
  if(is_int($var[$i])==1){
    echo "The method is_int returned true for $var[$i] \n";
 } else {
    echo "The method is_int returned false for $var[$i] \n";
}

  if(is_integer($var[$i])==1){
    echo "The method is_integer returned true for $var[$i] \n";
 } else {
    echo "The method is_integer returned false for $var[$i] \n";
}

  if(is_numeric($var[$i])==1){
    echo "The method is_numeric returned true for $var[$i] \n";
 } else {
    echo "The method is_numeric returned false for $var[$i] \n";
}

}
?>