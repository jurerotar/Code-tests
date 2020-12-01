<?php

/**

 */

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s)
    {
        $s = preg_replace("/[^0-9\-\+]/", '', $s);
        if (intval($s) < PHP_INT_MIN)
        {
            $s = PHP_INT_MIN;
        }
        else if (intval($s) > PHP_INT_MAX)
        {
            $s = PHP_INT_MAX;
        }
        else
        {
            return intval($s);
        }
    }
}
