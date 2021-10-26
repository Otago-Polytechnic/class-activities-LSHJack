<?php

$numbers = array(45.3, 67.5, -45.6, 20.34, -33.0, 45.6);
$total = 0;
foreach($numbers as $x) $total+=$x;
$average = $total / count($numbers);

echo "Average: $average";

//Expected Output:
//Average: 16.69

?>