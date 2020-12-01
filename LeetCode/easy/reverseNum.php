<?php

/**
 Given a 32-bit signed integer, reverse digits of an integer.
 */

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $isNegative = ($x < 0) ? -1 : 1;
        $reversed = (int) strrev((string) $x);
        return ($reversed > 2 ** 31 - 1 || $reversed < -2 ** 31) ? 0 : $isNegative * $reversed;
    }
}
