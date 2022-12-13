<?php

namespace App;

class Router
{
    private function getUrl()
    {
        if (isset($_GET["url"])) {
            $url = $_GET["url"];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return $url;
        }
    }

    public function __construct()
    {
        $url = $this->getUrl();

        if (isset($url) && file_exists(__DIR__ . "/../views/pages/" . $url . ".php")) {
            require_once __DIR__ . "/../views/pages/" . $url . ".php";
            exit;
        } elseif (isset($url) && !file_exists(__DIR__ . "/../views/pages/" . $url . ".php")) {
            require_once __DIR__ . "/../views/errors/_404.php";
            exit;
        } else {
            require_once __DIR__ . "/../views/pages/index.php";
            exit;
        }
    }
}
