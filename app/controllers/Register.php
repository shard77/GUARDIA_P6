<?php

class Register extends Controller
{
    public function index($a = "", $b = "", $c = "")
    {
        echo "This is the register controller";

        if(!empty($_POST['register'])) {

		}

        $this->view("register");
    }

    public function register() 
    {
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-validate'])) {
            $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            
            $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)
            
        }
    }

}
