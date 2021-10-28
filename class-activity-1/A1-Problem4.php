<?php

//Class Activity 1 - Question 4
//Jack Lam
//Expected Output:
//1
//Fizz
//Buzz
//7
//Fizz
//11
//13
//FizzBuzz

    function fizzBuzz($num)
    {
        $return_value="";
        if(($num % 3)==0) $return_value="Fizz";
        if(($num % 5)==0) $return_value= $return_value."Buzz";
        if($return_value=="") $return_value=$num;

        return $return_value;
    }

    for ($i = 1; $i <= 15; $i += 2) echo fizzBuzz($i). nl2br("\n");

?>