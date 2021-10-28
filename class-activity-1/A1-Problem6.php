<?php

//Class Activity 1 - Question 6
//Jack Lam
//Expected Output:
//true
//false

    function is_anagram($string_one, $string_two)
    {
        $str1_array=str_split($string_one);
        $str2_array=str_split($string_two);
        sort($str1_array);
        sort($str2_array);
        if($str1_array == $str2_array)

        return true;
        else return false;
    }

    if(is_anagram("elvis", "lives")) echo nl2br("elvis & lives is anagram: true\n\n");
    else echo nl2br("elvis & lives is anagram: false\n\n");

    if(is_anagram("cat", "sat")) echo nl2br("cat & sat is anagram: true\n\n");
    else echo nl2br("cat & sat is anagram: false\n\n");

?>