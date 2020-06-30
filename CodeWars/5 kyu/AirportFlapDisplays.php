<?php
/*

How it works
You notice that each flap character is on some kind of a rotor and the order of characters on each rotor is:

ABCDEFGHIJKLMNOPQRSTUVWXYZ ?!@#&()|<>.:=-+* /0123456789

And after a long while you deduce that the display works like this:

Starting from the left, all rotors (from the current one to the end of the line) flap together until the left-most rotor character is correct.
Then the mechanism advances by 1 rotor to the right...
...REPEAT this rotor procedure until the whole line is updated
...REPEAT this line procedure from top to bottom until the whole display is updated

Given the initial display lines and the rotor moves for each line, determine what the board will say after it has been fully updated.
For your convenience the characters of each rotor are in the pre-loaded constant ALPHABET which is a string.
*/

define('ALPHABET', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ ?!@#&()|<>.:=-+*/0123456789');
function flap_display($lines, $rotors) {
    $alphabetLength = strlen(ALPHABET);
    $iteration = 0;
    $arr = array_map(function (string $element, int $movement) use($alphabetLength, &$iteration) {
        $position = strpos(ALPHABET, $element);
        $movement += $iteration;
        $position = $position + $movement > $alphabetLength ? $position + $movement - $alphabetLength : $position + $movement;
        $iteration = $movement;
        return ALPHABET[$position];
    }, str_split($lines[0]), $rotors);

    return [implode('', $arr)];
}
