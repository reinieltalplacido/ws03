<?php

namespace  Framework;

use App\Controllers\ErrorController;
use Framework\Middleware\Authorize;
class Router
{
    /**
     * Add a new route
     * @param string $method
     * @param string $uri
     * @param string $action
     * @param array $middleware
     * @return void
     */ 
    protected $routes = [];

    public function registerRoute($method, $uri, $action, $middleware = [])
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }

    /**
     * Add GET route
     * 
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function get($uri, $controller, $middleware = [])
    {
        $this->registerRoute('GET', $uri, $controller, $middleware);
    }

    /**
     * Add POST route
     * 
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */ 
    public function post($uri, $controller, $middleware = [])
    {
        $this->registerRoute('POST', $uri, $controller, $middleware);
    }

    /**
     * Add PUT route
     * 
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function put($uri, $controller,$middleware = [])
    {
        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    /**
     * Add DELETE route
     * 
     * @param string $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */
    public function delete($uri, $controller, $middleware = [])
    {
        $this->registerRoute('DELETE', $uri, $controller, $middleware);
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

                foreach($route['middleware'] as $middleware) {
                    (new Authorize())->handle($middleware);
                    
                }
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
