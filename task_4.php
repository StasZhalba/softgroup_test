<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2017
 * Time: 9:40
 */

if (isset($_GET['days']) & isset($_GET['political'])){
    $days = $_GET['days'];
    $political = $_GET['political'];
    if (empty($days) | empty($political) | $days < 1 | $political < 1 | $days > 999999 | $political > 99){
        echo '<form method="get" action="task_4.php">
                <label for="days">Кількість днів N: </label>
                <input type="number" id="days" name="days" min="2" max="999999"><br>
                <label for="political">Кількість політичних партій K: </label>
                <input type="number" id="political" name="political" min="2" max="99"><br>
                <input type="submit" id="submit" name="submit" value="OK">
              </form>';
    } else {
        echo '<form method="post" action="task_4.php?days= '. $days .'&pol='.$political.'">';
        for ($i = 1; $i <= $political; $i++){
            echo '<label for="a'. $i .'">a'. $i .'</label>';
            echo '<input type="number" id="a'.$i.'" name="a'.$i.'" required value="">';
            echo '<label for="b'. $i .'">b'. $i .'</label>';
            echo '<input type="number" id="b'.$i.'" name="b'.$i.'" required value="">';
            echo '<br>';
            echo '<br>';
        }
        echo '<input type="submit" id="submit" name="submit" value="OK">';
        echo '</form>';
    }
} else if (isset($_POST['submit'])){
    $days_political_arr = array();
    $post_name_a = 'a1';
    $post_name_b = 'b1';
    $days_max = $_GET['days'];
    $n_pol = $_GET['pol'];
    for ($i = 1; $i <= $n_pol; $i++) {
        $post_name_a = 'a' . $i;
        $post_name_b = 'b' . $i;
        $days_political = $_POST[$post_name_a] * 1;
        if (!is_holiday($days_political)) {
            array_push($days_political_arr, $days_political);
        }
        $increment_2 = 1;
        while ($days_political <= $days_max){
            $days_political = $_POST[$post_name_a] + $increment_2 * $_POST[$post_name_b];
            if (!is_holiday($days_political)) {
                array_push($days_political_arr, $days_political);
            }
            $increment_2++;
        }
    }
    $days_political_arr = array_unique($days_political_arr);
    echo '<br>';
    echo 'Загальнонаціональні страйки пройдуть: ';
    asort($days_political_arr);
    foreach ($days_political_arr as $days){
        echo $days . ', ';
    }
} else {
    echo '<form method="get" action="task_4.php">
    <label for="days">Кількість днів N: </label>
    <input type="number" id="days" name="days" min="2" max="999999"><br>
    <label for="political">Кількість політичних партій K: </label>
    <input type="number" id="political" name="political" min="2" max="99"><br>
    <input type="submit" id="submit" name="submit" value="OK">
</form>';
}

function is_holiday($number_of_day){
    if ($number_of_day <= 7){
        if ($number_of_day == 6 || $number_of_day == 7){
            return true;
        }
    }
    else {
        while ($number_of_day >= 7){
            $number_of_day = $number_of_day - 7;
        }
        if ($number_of_day == 6 || $number_of_day == 7){
            return true;
        }
        else {
            return false;
        }
    }
}



?>



<!--<form method="post">
    <label for="a">ai</label>
    <input type="number" id="a" name="a">
    <label for="b">bi</label>
    <input type="number" id="b" name="b"><br>
</form>-->
