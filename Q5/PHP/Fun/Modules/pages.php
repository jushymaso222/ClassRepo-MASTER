<?php

function redirect($location) {
    header("Location: ". $location);
}

function home() {
    exit();
}