<?php

//Class Activity 1 - Question 3
//Jack Lam
//Expected Output:
//Average: 16.69

$numbers = array(45.3, 67.5, -45.6, 20.34, -33.0, 45.6);
$total = 0;
foreach($numbers as $x) $total+=$x;
$average = $total / count($numbers);

echo "Average: $average";

?>