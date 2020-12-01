<?php

/**
Count the number of prime numbers less than a non-negative number, n.
 */

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function countPrimes($n)
    {
        if ($n <= 2)
        {
            return 0;
        }
        $primes = 1;
        for ($i = 3; $i < $n; $i += 2)
        {
            if ($this->isPrime($i))
            {
                $primes++;
            }
        }
        return $primes;
    }
    function isPrime($n)
    {
        $limit = ($n <= 10) ? $n : floor(sqrt($n)) + 1;
        for ($i = 3; $i < $limit; $i += 2)
        {
            if ($n % $i === 0)
            {
                return false;
            }
        }
        return true;
    }
}
