<?php

class Login extends Controller
{
    public function index()
    {
        if (!checkSession()) {
            if(!empty($_POST['login-submit'])) {
                $this->login();
            }
    
            $this->view("login");
        } else {
            header("Location:".ROUTE."home");
        }
    }

    public function login() 
    {
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_POST['password'];

            $user = $this->model("user");
            $user->loginInput([
                "username" => $username,
                "password" => $password
            ]);

            header("Location:".ROUTE."home");
            
        }
    }

}
