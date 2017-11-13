<?php

namespace Routes;

use Illuminate\Support\Facades\Route;

class RouteGenerator
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $method;

    /**
     * ComputeRoute constructor.
     * @param string $name
     * @param string $type
     * @param string $controller
     * @param string $method
     */
    private function __construct(string $name, string $type, string $controller, string $method)
    {
        $this->name             = $name;
        $this->type             = $type;
        $this->controller       = $controller;
        $this->method           = $method;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    private function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    private function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    private function generateRoute()
    {
        return Route::{$this->getType()}($this->getName(),$this->getController() . $this->getMethod());
    }

    /**
     * @param array $options
     * @return mixed
     */
    private function generateRouteRecource(array $options)
    {
        return Route::{$this->getType()}($this->getName(),$this->getController(),$options);
    }

    /**
     * @param string $name
     * @param string $type
     * @param string $controller
     * @param string $method
     * @return object
     */
    public static function generate(string $type, string $name, string $controller, string $method)
    {
        $route = new RouteGenerator($name,$type,$controller,$method);
        return $route->generateRoute();
    }

    /**
     * @param string $name
     * @param string $controller
     * @param array $options
     * @return mixed
     */
    public static function generateResource(string $name, string $controller, array $options = [])
    {
        $route = new RouteGenerator($name,"resource",$controller,"");
        return $route->generateRouteRecource($options);
    }



}



?>