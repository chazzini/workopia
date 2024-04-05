<?php
namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    /**
     * Register Routes
     * 
     * @param string $method
     * @param string $uri
     * @param string $controller
     * 
     * @return void
     */
    public function registerRoutes(string $method, string $uri, string $action): void
    {
        //destructure array into variables
        [$controller, $controllerMethod] = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Register Get Route
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return void
     */
    public function get(string $uri, string $controller): void
    {
        $this->registerRoutes('GET', $uri, $controller);
    }

    /**
     * Register Post Route
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return void
     */
    public function post(string $uri, string $controller): void
    {
        $this->registerRoutes('POST', $uri, $controller);
    }

    /**
     * Register Delete Route
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return void
     */
    public function delete(string $uri, string $controller): void
    {
        $this->registerRoutes('DELETE', $uri, $controller);
    }
    /**
     * Register Put Route
     * 
     * @param string $uri
     * @param string $controller
     * 
     * @return void
     */
    public function put(string $uri, string $controller): void
    {
        $this->registerRoutes('PUT', $uri, $controller);
    }




    /**
     * Route the request
     * 
     * @param string $uri
     * @param string $method
     * 
     * @return void
     */
    public function route(string $uri): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {

            //split the current URI into segments
            $uriSegments = explode('/', trim($uri, '/'));


            //split the route uri into segments
            $routeSegments = explode('/', trim($route['uri'], '/'));





            if (
                count($routeSegments) === count($uriSegments)
                && $route['method'] == strtoupper($requestMethod)
            ) {



                $params = [];
                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {


                    if (($routeSegments[$i] != $uriSegments[$i]) && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }


                    //check for the param and add to param array
                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }



                }

                if ($match) {
                    //Extract controller and controller method
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    //Instatiate the controlle and call the method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
            // if(count($uriSegments) == count($routeSegments) && preg_match()){

            //     for($i =0;);
            // }


            // if ($route['uri'] === $uri && $route['method'] == $method) {
            //     //Extract controller and controller method
            //     $controller = 'App\\Controllers\\' . $route['controller'];
            //     $controllerMethod = $route['controllerMethod'];

            //     //Instatiate the controlle and call the method
            //     $controllerInstance = new $controller();
            //     $controllerInstance->$controllerMethod();
            //     return;
            // }

        }
        ErrorController::notfound();
    }
}