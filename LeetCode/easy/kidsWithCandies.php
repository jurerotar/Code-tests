<?php

/**
Given the array candies and the integer extraCandies, where candies[i] represents the number of candies that the ith kid has.

For each kid check if there is a way to distribute extraCandies among the kids such that he or she can have the greatest number of candies among them.
Notice that multiple kids can have the greatest number of candies.
 */

class Solution
{
    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies)
    {
        $max = max($candies);
        return array_map(function ($numberOfCandies) use ($extraCandies, $max)
        {
            return $numberOfCandies + $extraCandies >= $max;
        }, $candies);
    }
}
