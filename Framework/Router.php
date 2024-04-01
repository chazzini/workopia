<?php
namespace Framework;

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
    public function registerRoutes(string $method, string $uri, string $controller): void
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
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
     * Load error page
     * @param int $http_code
     * @return void
     */
    public function error(int $http_code = 404)
    {
        http_response_code($http_code);
        loadView("errors/" . $http_code);
        exit;
    }


    /**
     * Route the request
     * 
     * @param string $uri
     * @param string $method
     * 
     * @return void
     */
    public function route(string $uri, string $method): void
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] == $method) {
                require basePath('App/' . $route['controller']);
                return;
            }

        }
        $this->error(404);
    }
}