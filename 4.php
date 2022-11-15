<!-- 4. Write a code using Regex, to solve problem listed: 
a. Provided String: “abc@grepsr.com” 
b. Create an array with two values. Example: [‘abc’,’grepsr.com’] 
c. Ref: https://regex101.com/ (Try/Test)  -->

<?php
$input = "abc@grepsr.com";
$output = preg_split('/@/', $input);
echo $output[0];
echo $output[1];
?>