<?php

/**
Given an array of integers arr, replace each element with its rank.

The rank represents how large the element is. The rank has the following rules:

Rank is an integer starting from 1.
The larger the element, the larger the rank. If two elements are equal, their rank must be the same.
Rank should be as small as possible.
 */

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr)
    {
        $uniques = array_unique($arr, SORT_NUMERIC);
        sort($uniques);
        array_unshift($uniques, '');
        $uniques = array_flip($uniques);
        return array_map(function ($element) use ($uniques)
        {
            return $uniques[$element];
        }, $arr);
    }
}
