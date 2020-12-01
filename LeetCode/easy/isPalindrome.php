<?php

/**
Given a string, determine if it is a palindrome, considering only alphanumeric characters and ignoring cases.

Note: For the purpose of this problem, we define empty string as valid palindrome.
 */

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        if ($s === '')
        {
            return true;
        }
        $s =  strtolower(preg_replace('/[[:^alnum:]]/', '', $s));
        return $s === strrev($s);
    }
}
