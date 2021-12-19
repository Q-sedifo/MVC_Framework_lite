<?php

namespace core;

use core\View; 

class Router 
{
    public $route;
    public $controllerName;
    public $actionName;

    public function getUrl() 
    {
        $this->controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'index';
        $this->actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
    }

    public function run() 
    {
        $this->getUrl();
        // Set route as controller => action
        $this->setRoute();

        $controllerName = ucfirst($this->controllerName) . 'Controller';
        $actionName = $this->actionName . 'Action';

        $path = PathPrefix . $controllerName . PathPostfix;

        if (file_exists($path)) {
            require_once $path;
            $controller = new $controllerName($this->route);

            if (method_exists($controllerName, $actionName)) {
                $controller->$actionName();
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

    public function setRoute() 
    {
        $this->route['controller'] = $this->controllerName;
        $this->route['action'] = $this->actionName;
    }

}