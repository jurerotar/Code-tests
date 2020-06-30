<?php

/*
Create two functions to encode and then decode a string using the Rail Fence Cipher. This cipher is used to encode a string by placing each character successively in a diagonal along a set of "rails". First start off moving diagonally and down. When you reach the bottom, reverse direction and move diagonally and up until you reach the top rail. Continue until you reach the end of the string. Each "rail" is then read left to right to derive the encoded string.
For example, the string "WEAREDISCOVEREDFLEEATONCE" could be represented in a three rail system as follows:

W       E       C       R       L       T       E
  E   R   D   S   O   E   E   F   E   A   O   C
    A       I       V       D       E       N
The encoded string would be:

WECRLTEERDSOEEFEAOCAIVDEN

Write a function/method that takes 2 arguments, a string and the number of rails, and returns the ENCODED string.
Write a second function/method that takes 2 arguments, an encoded string and the number of rails, and returns the DECODED string.
For both encoding and decoding, assume number of rails >= 2 and that passing an empty string will return an empty string.
Note that the example above excludes the punctuation and spaces just for simplicity. There are, however, tests that include punctuation. Don't filter out punctuation as they are a part of the string.

*/

function encodeRailFenceCipher(string $string, int $rails): string {
    return $string ? implode('', array_merge(...railFenceCipher($string, $rails))) : '';
}

function decodeRailFenceCipher(string $string, int $rails): string {
    if(! $string) {
        return '';
    }
    $arrayLengths = array_map(fn($array) => count($array), railFenceCipher($string, $rails));
    $substringStart = 0;
    $arr = [];
    foreach($arrayLengths as $index => $length) {
        $arr[$index] = str_split(substr($string, $substringStart, $length));
        $substringStart += $length;
    }
    $index = 1;
    $mode = 1;
    $str = '';
    for($i = 0; $i < strlen($string); $i ++) {
        $letter = $arr[$index][0];
        $str .= $letter;
        array_splice($arr[$index], 0, 1);
        if($index === $rails) {
            $mode = 0;
        }
        else if ($index === 1) {
            $mode = 1;
        }
        $mode ? $index ++ : $index --;
    }
    return $str;
}

/**
 * Returns array of arrays, containing split string
 */
function railFenceCipher(string $string, int $rails): array {
    $arr = [];
    $mode = 1;
    $index = 1;
    for($i = 0; $i < strlen($string); $i ++) {
        $arr[$index][] = $string[$i];
        if($index === $rails) {
            $mode = 0;
        }
        else if ($index === 1) {
            $mode = 1;
        }
        $mode ? $index ++ : $index --;
    }
    return $arr;
}
