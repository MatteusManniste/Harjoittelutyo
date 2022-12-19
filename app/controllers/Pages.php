<?php

class Pages extends Controller
{

    public function __construct()
    {
        if (isLoggedIn()) {
            redirect("posts");
        }
    }

    public function index()
    {
        $this->view('pages/index');
    }
}
