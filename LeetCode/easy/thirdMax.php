<?php

/**
Given a non-empty array of integers, return the third maximum number in this array.
If it does not exist, return the maximum number.
The time complexity must be in O(n).
 */

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMaxSolution1($nums)
    {
        $helperArray = [];
        $isFull = false;
        foreach ($nums as &$number)
        {
            if (in_array($number, $helperArray))
            {
                continue;
            }
            $helperArray[] = $number;
            if (!$isFull)
            {
                $isFull = count($helperArray) === 3;
            }
            else
            {
                unset($helperArray[array_search(min($helperArray), $helperArray)]);
            }
        }
        if (count(array_unique($helperArray)) < 3)
        {
            return max($nums);
        }
        return min($helperArray);
    }
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMaxSolution2($nums)
    {
        $num1 = PHP_INT_MIN;
        $num2 = PHP_INT_MIN;
        $num3 = PHP_INT_MIN;
        $len = count($nums);
        for ($i = 0; $i < $len; $i++)
        {
            $number = $nums[$i];
            if ($number === $num1 || $number === $num2 || $number === $num3)
            {
                continue;
            }
            if ($number > $num1)
            {
                $num3 = $num2;
                $num2 = $num1;
                $num1 = $number;
                continue;
            }
            if ($number > $num2)
            {
                $num3 = $num2;
                $num2 = $number;
                continue;
            }
            if ($number > $num3)
            {
                $num3 = $number;
                continue;
            }
        }
        return (count(array_unique($nums)) < 3) ? max($nums) : min([$num1, $num2, $num3]);
    }
}
