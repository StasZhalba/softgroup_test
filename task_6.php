<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.01.2017
 * Time: 19:28
 */



if (isset($_GET['number_input'])){
    if (is_numeric($_GET['number_input'])) {
        $number_input = $_GET['number_input'];
        echo '<form method="post" action="task_6.php?number='.$number_input.'">';
        for ($i = 1; $i <= $number_input; $i++) {
            $id_input = 'input_' . $i;
            $name_input = 'name_input_' . $i;
            $name_user = 'name_user_' . $i;
            echo '<label>Поле ' . $i . ': </label>';
            echo '<br><label for="'.$name_user.'">Імя учасника: </label>';
            echo '<input type="text" id="'.$name_input.'" name="'.$name_input.'" required value="">';
            echo '<lable>Кількість окулярів: </lable>';
            echo '<input type="number" id="' . $id_input . '" name="' . $id_input . '" required value="">';
            echo '<br><br>';
        }
        echo '<input type="submit" id="submit" name="submit" value="Добавити">';
        echo '</form>';
    }
} else if (isset($_POST['submit'])){
    $participant_array = array();
    $number_input = $_GET['number'];
    for ($i = 1; $i <= $number_input; $i++){
        $post_name_participant = 'name_input_' . $i;
        $post_name_input = 'input_' . $i;
        $name_participant = $_POST[$post_name_participant];
        $name_score = $_POST[$post_name_input] * 1;
        $participant_array[] = array('n' => $i, 'name' => $name_participant, 'score' => $name_score);
    }
    var_dump($participant_array);
} else {
    echo '<form method="get">
    <label for="number_input">Ведіть кількість записів: </label>
    <input type="number" id="number_input" name="number_input" min="1" max="100"><br>
    <input type="submit" id="submit" name="submit" value="Добавить">
</form>';
}

?>


