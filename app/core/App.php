<?php

class App{
    public static function start(){
        $ruta=Request::getRuta();
        Log::info($ruta);
        $dijelovi=explode('/',substr($ruta,1));
        Log::info($dijelovi);

        $controller='';
        $x='';
        if(!isset($dijelovi[0]) || $dijelovi[0]===''){
            $controller='IndexController';
        } else{
            $x=ucfirst($dijelovi[0]);
            $controller = $x . 'Controller';
        }

        Log::info($controller);

        $metoda='';

        if(!isset($dijelovi[1]) || $dijelovi[1]===''){
            $metoda='index';
        } else{
            $metoda = $dijelovi[1];
        }

        Log::info($metoda);

        if(class_exists($controller) && method_exists($controller,$metoda)){
            $instanca = new $controller();
            $instanca->$metoda();
        } else{
            echo ' 404 - NOT FOUND ' . '<br>';
            echo ' CONTROLLER ' . $controller . ' AND METHOD ' . $metoda . ' DOES NOT EXIST ! ' . '<br>';
        }
    }
}