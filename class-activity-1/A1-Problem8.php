<?php

    function palindrome($string)
    {
        $str = str_split(strtolower(preg_replace('/[^a-zA-Z]/','',$string)));
    
        $length=count($str)-1;
        for($i=0;$i<count($str);$i++)
        {
            if($str[$i]<>$str[$length]) return false;
            $length--;
        }
        return true;
    }

    echo nl2br("A man, a plan, a canal - Panama is palindrome\n");
    if(palindrome("A man, a plan, a canal - Panama")) echo nl2br("true\n\n");
    else echo nl2br("false\n\n");

    echo nl2br("Hello,World! is palindrome\n");
    if(palindrome("Hello,World!")) echo nl2br("true\n\n");
    else echo nl2br("false\n\n");

    //Expected Output:
    //true
    //false

?>