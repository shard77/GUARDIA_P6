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
        if(!empty($_POST['login-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                    $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $password = $_POST['password'];
        
                    $userModel = $this->model("user");
                    $user = $userModel->loginInput([
                        "username" => $username,
                        "password" => $password
                    ]);
                    show($user);

                    if(!$user) {
                        show("<div class='text-white absolute'>Username or password is incorrect!</div>");
                    } else {
                        header("Location:".ROUTE."home");
                    }
                }

            } else {
                show("<div class='text-white absolute'>CSRF Token is not valid :(</div>");
            }         
        }
    }
}
