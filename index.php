<?php

  
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  

  /* INIT FILES*/
  include_once "config/autoload.php";
  include_once "config/data.php";
  include_once "config/request.php";
  include_once "config/router.php";


  /* ALIAS */
  use config\Autoload as Autoload;
  use config\Router   as Router;
  use config\Request  as Request;

  /* EXECUTION FLOW*/

  Autoload::start();

  $request = new Request();

  Router::direct($request);
