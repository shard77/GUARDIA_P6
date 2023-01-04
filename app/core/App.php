<?php

class App
{
    private $controller = "Home";
    private $method     = "index";

    private function splitURL()
    {
        $URL = $_SERVER['PATH_INFO'] ?? "home";
        $URL = explode("/", $URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        $filename = "../app/controllers/" . ucfirst($URL[1]) . ".php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[1]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}
