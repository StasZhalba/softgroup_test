<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.12.2016
 * Time: 19:52
 */
set_time_limit(3600);
$number = $_GET['number'];
echo 'Your number = ' . $number . '<br>';



function is_perfect($number){

    $perfect = 6;
    $increment = -1;
    $perfect_list = array(3, 5, 7, 13, 17, 19, 31, 67, 127, 257);
    while ($perfect <= $number) {
        echo 'Result = ' . $perfect . '<br>';
        $increment++;
        $n = $perfect_list[$increment];
        $perfect = (pow(2, $n-1)) * (pow(2, $n) - 1);
    }
}

is_perfect($number);

?>
