<?php


/*
Given the string representations of two integers, return the string representation of the sum of those integers.

For example:

sumStrings('1','2') // => '3'
A string representation of an integer will contain no characters besides the ten numerals "0" to "9".
*/

function sum_strings($a, $b) {
    $a = '0' . $a;
    $b = '0' . $b;
    $lenA = strlen($a);
    $lenB = strlen($b);
    $carry = 0;
    $value = '';
    if($lenA > $lenB) {
        $b = str_repeat('0', $lenA - $lenB) . $b;
        $lenB = strlen($b);
    }
    else {
        $a = str_repeat('0', $lenB - $lenA) . $a;
        $lenA = strlen($a);
    }
    for($i = $lenA - 1; $i > 0; $i --) {
        $sum = (int) $a[$i] + (int) $b[$i] + $carry;
        $carry = (int) ($sum / 10);
        $value = ($i === 1 ? $sum : $sum % 10) . $value;
    }
    return ltrim($value, '0');
}
