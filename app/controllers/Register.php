<?php

class Register extends Controller
{
    public function index()
    {
        echo "This is the register controller";

        if(!empty($_POST['register-submit'])) {
            $this->register();
		}

        $this->view("register");
    }

    public function register() 
    {
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-validate'])) {
            $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                show("Please specify a valid email");
            } 

            $password = $_POST['password'];
            $passwordValidate = $_POST['password-validate'];

            if ($password !== $passwordValidate) {
               show("NOT THE SAME PASSWORD!");
            }            
        }
    }

}
