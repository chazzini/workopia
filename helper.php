<?php
/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
 function  basePath(string $path =''):string
 {
    return __DIR__.'/'.$path;
 }

 /**
  * Load view
  *
  * @param string $view
  * @return void
  */
  function loadView(string $view):void
  {
    $viewPath =basePath("views/{$view}.view.php");

    if(file_exists($viewPath)){

        require $viewPath;
    }else{
        echo "{$view} not found";
    }
  }
 /**
  * Load partials
  *
  * @param string $view
  * @return void
  */
  function loadPartial(string $view):void
  {
    
    $viewPath = basePath("views/partials/{$view}.php");

    if(file_exists($viewPath)){

        require $viewPath;
    }else{
        echo "{$view} not found";
    }
  }