<?php

namespace App;

class Router
{
    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function __construct()
    {
        $url = $this->getUrl();

        if (isset($url) && file_exists(__DIR__ . "/../views/pages/" . $url[0] . ".php")) {
            require_once __DIR__ . "/../views/pages/" . $url[0] . ".php";
        } elseif (isset($url) && !file_exists(__DIR__ . "/../views/pages/" . $url[0] . ".php")) {
            require_once __DIR__ . "/../views/errors/_404.php";
        } else {
            require_once __DIR__ . "/../views/pages/index.php";
        }
    }
}
