<?php

//Class Activity 1 - Question 7
//Jack Lam
//Expected Output:
//3780

    function convert($hours,$minutes)
    {
        return $hours * 60 * 60 + $minutes * 60;
    }

    echo convert(1,3);

?>