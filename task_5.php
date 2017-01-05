<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.12.2016
 * Time: 19:59
 */

function getWordsFromString($string)
{
    if (preg_match_all('/[A-Za-z\']+/', $string, $matches)) {
        return $matches[0];
    }

    return array();

}

$text = 'one two one two three';

echo 'Your text: ' . $text . '<br>';
$text_word = getWordsFromString($text);

if (count($text_word) > 0){
    $words["$text_word[0]"] = 0;
    echo 'Result: 0 ';

    for ($i = 1; $i < count($text_word); $i++){
        $key = $text_word[$i];
        if (!(array_key_exists($key, $words))){
            $words["$key"] = 0;
            echo '0 ';
        }
        else {
            $num = $words["$key"];
            $num++;
            $words["$key"] = $num;
            echo $num . ' ';
        }
    }
}


