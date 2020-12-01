<?php

/**
 Given an array nums of integers, return how many of them contain an even number of digits.
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumbers($nums)
    {
        return array_reduce($nums, function ($carry, $num)
        {
            $carry += (strlen((string)($num)) % 2 === 0) ? 1 : 0;
            return $carry;
        });
    }
}
