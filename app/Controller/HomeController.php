<?php

namespace Http\Controller;

class HomeController extends AppController
{

    public function index()
    {
        $this->render->view('home/index.html');
    }

}