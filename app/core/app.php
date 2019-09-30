<?php

class core_app
{
    protected $controller_name = 'home';
    protected $controller;
    protected $method_name = 'index';
    protected $params;

    public function __construct()
    {
        $route = $this->get_route();

        if (isset($route[0]))
        {
            $this->controller_name = $route[0];
            unset($route[0]);
        }

        $this->controller_name = 'controllers_' . $this->controller_name;

        if (class_exists($this->controller_name))
        {
            $this->controller = new $this->controller_name;
        }
        else
        {
            header('location: /error');
            die;
        }
        
        if (isset($route[1]))
        {
            if (method_exists($this->controller, $route[1]))
            {
                $this->method_name = $route[1];
                unset($route[1]);
            }  
        }

        $this->params = $route ? array_values($route) : [];
        call_user_func_array([$this->controller, $this->method_name], $this->params);
    }

    private function get_route()
    {
        if (isset($_GET['route']))
        {
            return explode('/', filter_var(rtrim(strtolower($_GET['route']), '/'), FILTER_SANITIZE_URL));
        }
    }
}
