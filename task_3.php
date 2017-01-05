<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.12.2016
 * Time: 19:07
 */

function is_simple_number($n){
    for($x=2; $x <= sqrt($n); $x++) {
        if($n % $x == 0) {
            return false;
        }
    }
    return true;
}

$punctuation = array(',', '.', '/', ':', ';', '!', '?', '_');
$numbers = '1,5,7,4,3,78';

$clean_numbers = str_replace($punctuation, ' ', $numbers);
$numbers_array = explode(' ', $clean_numbers);

if (count($numbers_array) > 0){
    $simple_numbers = 0;
    foreach ($numbers_array as $number) {
        if (($number > 1) & is_simple_number($number)){
            $simple_numbers++;
        }
    }

    echo 'Result = ' . $simple_numbers;
}
