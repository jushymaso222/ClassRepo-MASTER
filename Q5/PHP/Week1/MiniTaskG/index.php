<?php

function fizzBuzz($num) {
    if (($num % 2) == 0 && ($num % 3) == 0) { //If divisible by 2 and 3
        return 'Fizz Buzz';
    } elseif (($num % 2) == 0) { //if divisible by 2
        return 'Fizz';
    } elseif (($num % 3) == 0) { //if divisible by 3
        return 'Buzz';
    } else {
        return (string)$num;
    }
}

require 'index.view.php'; //HTML view
