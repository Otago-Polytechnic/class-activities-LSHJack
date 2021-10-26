<?php

    function convert($hours,$minutes)
    {
        return $hours * 60 * 60 + $minutes * 60;
    }

    echo convert(1,3);

    //Expected Output:
    //3780

?>