<?php

class Application
{
    private $dependencies = array();

    public function register($name, Closure $resolve)
    {
        $this->dependencies[$name] = $resolve;
    }

    public function resolve($name)
    {
        if (isset($this->dependencies[$name])) {
            return $this->dependencies[$name]();
        }
        throw new Exception('Nothing registered with that name, fool.');
    }
}
