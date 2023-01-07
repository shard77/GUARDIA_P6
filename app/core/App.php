<?php

class App
{
    private $controller = "Home";
    private $method     = "index";

    private function splitURL()
    {
        $URL = $_SERVER['PATH_INFO'] ?? "home";
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();
        for ($i = 0; $i < count($URL); $i++) {
            if (isset($URL[$i])) {
                $URL[$i] = filter_var($URL[$i], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller;
        if(!empty($URL[1])) {
            if(method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }

        if(!empty($URL[2])) {
            if(method_exists($controller, $URL[2])) {
                $this->method = $URL[2];
                unset($URL[2]);
            }
        }

        if(!empty($URL[3])) {
            if(method_exists($controller, $URL[3])) {
                $this->method = $URL[3];
                unset($URL[3]);
            }
        }

        if(!empty($URL[4])) {
            if(method_exists($controller, $URL[4])) {
                $this->method = $URL[4];
                unset($URL[4]);
            }
        }

        /*for ($i = 1; $i < count($URL); $i++) {
            if (method_exists($controller, $URL[$i])) {
                $this->method = $URL[$i];
                unset($URL[$i]);
            }
        }*/

        call_user_func_array([$controller, $this->method], $URL);
    }
}

