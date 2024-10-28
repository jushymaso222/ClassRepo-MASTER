<?php

function redirect($pageName, $params = "") {
    $page = $pageName . ".php";
    $folder = $pageName;
    $location = "pages/" . $folder . "/" . $page;
    if ($params != "") {
        $location .= "?". $params;
    }
    return $location;
}

$location = redirect("index");

parse_str($_SERVER['QUERY_STRING'], $params);
if (isset($params['redirect'])) {
    if (isset($params['params'])) {
        $location = redirect($params['redirect'], $params['params']);
    } else {
        $location = redirect($params['redirect']);
    }
}

include($location);