<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //var_dump( $this->getUrl() );
        // $url[0] = 'users', $url[1] = 'show', $url[2] = 354
        $url = $this->getUrl();

        // etsitään siitä kontrolleri
        if (isset($url) && file_exists('../app/controllers/' . ucwords($url[0] . '.php'))) {
            // jos kontrolleri löytyy asetetaan se currentControlleriin
            // poistetaan url-taulukosta ensimmäinen indeksi
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        //ladataan vaadittu kontrolleri
        require_once '../app/controllers/' . $this->currentController . '.php';

        // luodaan kyseisestä kontrollerista olio
        $this->currentController = new $this->currentController;

        // selvitetään kontrollerin metodi
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // selvitetään mahdolliset parametrit
        $this->params = $url ? array_values($url) : [];

        // lopuksi tehdään takaisin kutsuminen parametrien kanssa
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
