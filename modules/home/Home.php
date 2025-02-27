<?php

class Home extends Module
{

    public function index()
    {
        $this->view('home', ['data' => 'hola']);
    }

    public function about()
    {
       echo "Hola";
    }
}