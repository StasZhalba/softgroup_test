<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.12.2016
 * Time: 18:26
 */


$string = 'aaa sahdh hjhdjh h hjdsh hhsd';
$punctuation = array(',', '.', '/', ':', ';', '!', '?');

$clean_string = str_replace($punctuation, ' ', $string);
$string_words = explode(' ', $clean_string);

if (count($string_words) > 0){
    $max_word_len = strlen($string_words[0]);
    foreach ($string_words as $word){
        if(strlen($word) > $max_word_len){
            $max_word_len = strlen($word);
        }
    }
    foreach ($string_words as $word){
        if (strlen($word) == $max_word_len) {
            $string = str_replace($word, '', $string);
        }
    }
    echo $string;
}