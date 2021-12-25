<?php
/*
Given an array A[] consisting 0s, 1s and 2s. The task is to write a function that sorts the given array. The functions should put all 0s first, then all 1s and all 2s in last.
 */

/**
 * Sort 0s , 1s and 2s
 *
 * @param array $input An array to sort.
 *
 * @return array Sorted array
 */
function arraySort($input)
{
    //with function
    $array_values = array_count_values($input);
    $output = array_merge(array_fill(0, $array_values['0'], '0'), array_fill($array_values['0'], $array_values['1'], '1'), array_fill($array_values['0'] + $array_values['1'], $array_values['2'], '2'));
    return $output;

    ///without array_count_values
    $zero = $one = $two = 0;
    for ($i = 0; $i < count($input); $i++) {
        switch ($input[$i]) {
            case 0:
                $zero++;
                break;
            case 1:
                $one++;
                break;
            case 2:
                $two++;
                break;
            default:
                echo 'unidentified value';
        }
    }
    $output = array_merge(array_fill(0, $zero, '0'), array_fill($zero, $one, '1'), array_fill($zero + $one, $two, '2'));
    return $output;
}
//sample array
$a = array('2', '0', '1', '2', '0', '1', '2', '0', '0', '1', '2', '0', '2', '0', '1', '2', '1', '2', '1', '1', '2', '2', '1', '1');

echo '<pre>';
print_r($a);
echo '<br/>';
print_r(arraySort($a)); //sort and print result
echo '</pre>';
