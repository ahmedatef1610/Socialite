<?php 

// Initialising the two datetime objects 
$datetime1 = new DateTime('2019-10-16'); 
$datetime2 = new DateTime(date( 'Y-m-d h:i:s A' )); 

// Calling the diff() function on above 
// two DateTime objects 
$difference = $datetime1->diff($datetime2); 

// Getting the difference between two 
// given DateTime objects 
echo date( 'Y-m-d h:i:s A' ) . "<br>";
echo $difference->y . "<br>"; 
echo $difference->m . "<br>"; 
echo $difference->d . "<br>"; 
echo $difference->h . "<br>"; 
echo $difference->i . "<br>"; 
echo $difference->s . "<br>"; 
echo "<pre>"; 
print_r($difference);
echo "</pre>"; 

?> 
