<?php
/*
Given an unsorted array of nonnegative integers, find a continuous subarray which adds to a given number.
 */

/**
 * Countinous subarray which adds to a given number.
 *
 * @param array $input An array to find subarray from.
 * @param int $value check against value
 *
 *
 * @return array Resuliting subarray array
 */
function findSubArray($input, $value)
{
    $result_array = [];
    for ($i = 0; $i < count($input); $i++) {
        array_push($result_array, $input[$i]);
        // echo '</br>Current Sum :' . $current_sum;

        //Removing all elements till the reult array is smaller than the required value
        while (array_sum($result_array) > $value) {
            array_shift($result_array);
        }
        // Return array as soon as we find it.
        if (array_sum($result_array) == $value) {
            return $result_array;
        }
    }
    return '["No Result Found"]';

}
$value = '48';
echo 'Countinous subarray which adds ' . $value;
$a = array('25', '8', '9', '11', '37', '1', '2', '5', '2', '11', '21', '10', '17', '5', '1', '2', '1', '2', '1', '1', '2', '2', '1', '1');
echo '<pre> Sample Array : -</br>';
print_r($a);
echo '<br/> Result : - </br>';
print_r(findSubArray($a, $value));
echo '</pre>';
