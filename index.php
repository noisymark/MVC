<?php

define('BP', __DIR__ . DIRECTORY_SEPARATOR);
define('BP_APP', BP. 'app' . DIRECTORY_SEPARATOR);

$zaAutoLoad=[
  BP_APP . 'model',
  BP_APP . 'controller',
  BP_APP . 'core'
];

$putanje = implode(PATH_SEPARATOR,$zaAutoLoad);

set_include_path($putanje);

spl_autoload_register(function($klasa){
  $putanje = explode(PATH_SEPARATOR, get_include_path());
  foreach($putanje as $putanja){
    //echo $putanja . '<br>';
    $datoteka = $putanja . DIRECTORY_SEPARATOR . $klasa . '.php';
    //echo $datoteka, '<br>';
    if(file_exists($datoteka)){
      require_once $datoteka;
      break;
    }
  }
});

App::start();