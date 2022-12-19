<?php

class Controller
{
    // lataa tietomalli
    public function model($model)
    {
        //ladataan tarvittava tietomalli
        // ja luodaan siitä olio
        require_once '../app/models/' . $model . '.php';

        return new $model();
    }

    //lataa tietty näkymä 
    public function view($view)
    {
        // if(file_exists("../app/views/$view.php" )){
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            //näkymää ei löydy
            require_once '../app/views/errors/_404.php';
            exit;
        }
    }
}
