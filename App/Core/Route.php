<?php

use App\App\Core\Render;

$url = isset($_GET['url']) ? $_GET['url'] : null;

if ($url != null) {
    $url = rtrim($url ?? '/');
    $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
} else {
    unset($url);
}

if (!empty($url[0])) {
    require_once 'App/Controllers/' . $url[0] . '.php';
    $controller = new $url[0]();
    if (isset($url[2])) {
        $controller->{$url[1]}($url[2], $url[3]);
    } else {
        if (isset($url[1])) {
            $controller->{$url[1]}();
        } else {
        }
    }
} else {
    require_once 'App/Controllers/HomeController.php';
    $home = new HomeController();
    $home->homePage();
}
