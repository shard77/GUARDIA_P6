<?php

class Controller
{
    public function view($name)
    {
        $filename = "../app/views/".$name.".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
    
    public function viewArgs($name, $data)
    {
        $filename = "../app/views/".$name.".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }


    public function model($name)
    {
        $filename = "../app/models/".$name.".model.php";
        if (file_exists($filename)) {
            require $filename;
            return new $name();
        } else {
            echo "model not found";
        }
    }    
}
