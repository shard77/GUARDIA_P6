<?php

class Login extends Controller
{
    public function index($a = "", $b = "", $c = "")
    {
        echo "This is the login controller";
        $this->view("login");
    }

}
