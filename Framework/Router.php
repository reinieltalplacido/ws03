<?php

namespace  Framework;

use App\Controllers\ErrorController;
class Router
{
    /**
     * Add a new route
     * @param string $method
     * @param string $uri
     * @param string @action
     * @return void
     */ 
    protected $routes = [];

    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Add GET route
     * 
     * @param string $uri
     * @param string @controller
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add POST route
     * 
     * @param string $uri
     * @param string @controller
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add PUT route
     * 
     * @param string $uri
     * @param string @controller
     * @return void
     */
    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add DELETE route
     * 
     * @param string $uri
     * @param string @controller
     * @return void
     */
    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    
    /**
     * Route the request
     * 
     * @param string $uri
     * @param string $method
     * @return void
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD']; 
        
        //Check for _method input
        if($requestMethod === 'POST' && isset($_POST['_method'])) {
            // Override the request method with the value of _method
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {
            //Split the Current URI into segments
            $uriSegments = explode('/',trim( $uri,'/'));
            
            //Split the route URI into segments
            $routeSegments = explode('/',trim( $route['uri'],'/'));
           
            $match = true;

            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];

                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    // if the uri do not match and there is no value in the id
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    //check for param and add to $params array 
                    if (preg_match ('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }
                if ($match) {
                // Extract Controller
                $controller   = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];
                //Instantiate controller 
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod($params);
                return;
                    
                }
            }
        }
        ErrorController::notFound();
    }
}
