<?php

/**
Given an array of integers, return indices of the two numbers such that they add up to a specific target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

Example:

Given nums = [2, 7, 11, 15], target = 9,

Because nums[0] + nums[1] = 2 + 7 = 9,
return [0, 1].
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        foreach($nums as $number) {
            $remainder = $target - $number;
            if(in_array($remainder, $nums) && $remainder !== $number) {
                return [array_search($number, $nums), array_search($remainder, $nums)];
            }
        }
        /**
         * If no solution was found, means the number is made of 2 same numbers, so we just return their indexes
         */
        $remainder = $target / 2;
        $arr = [];
        foreach($nums as $index => $number) {
            if($remainder === $number) {
                $arr[] = $index;
            }
            if(count($arr) === 2) {
                return $arr;
            }
        }
    }
}
