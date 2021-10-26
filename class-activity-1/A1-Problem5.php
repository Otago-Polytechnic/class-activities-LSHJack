<?php

$numbers = array(21, 19, 68, 55, 42, 12);

sort($numbers);

foreach($numbers as $x) if(($x % 2)<>0) echo nl2br("$x \n");

//Expected Output:
//19
//21
//55

?>