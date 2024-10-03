<?php

function checkAge($age) {
    if ($age >= 21) {
        return true;
    } else {
        return false;
    }
}

require 'index.view.php'; //HTML view
