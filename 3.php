<!-- 3. Write a code or function to display dates in provided format? 
Example: 
Input: 'Sep 20 2021' and '09092021' 
Output: 2021-09-20 and 'Sep-09-2021'  -->

<?php
 
   function convertDate($source) {
     if (is_numeric($source)) {
        $date = date_create_from_format('mdY', $source);
         return date_format($date, 'F-d-Y');
     } else {
       $date = new DateTime($source);
      return date_format($date,'Y-m-d');
}
}
echo convertDate('Jan 20 2021');
echo convertDate('09092022');
?>