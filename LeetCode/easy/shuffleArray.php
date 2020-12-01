<?php

/**

 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n)
    {
        $splitArray = array_chunk($nums, $n);
        return array_merge(...array_map(null, $splitArray[0], $splitArray[1]));
    }
}
