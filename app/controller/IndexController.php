<?php

class IndexController{
    public function index()
    {
        $view = new View();
        $view->render('inder');
    }

    public function primjer1()
    {
        $view = new View();
        $view->render('primjer1');
    }
}