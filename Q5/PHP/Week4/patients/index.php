<?php

function redirect($pageName) {
    $page = $pageName . ".php";
    $folder = $pageName;
    $location = "pages/" . $folder . "/" . $page;
    return $location;
}

$location = redirect("index");

parse_str($_SERVER['QUERY_STRING'], $params);
if (isset($params['redirect'])) {
    $location = redirect($params['redirect']);
}

include($location);