<?php

class Register extends Controller
{
    public function index()
    {
        if (!checkSession()) {
            if(!empty($_POST['register-submit'])) {
                $this->register();
            }
    
            $this->view("register");
        } else {
            header("Location:".ROUTE."home");
        }
    }

    public function register() 
    {
        if(!empty($_POST['register-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-validate'])) {
                    $userModel = $this->model("user");
                    $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
                    $password = trim($_POST['password']);
                    $passwordValidate = trim($_POST['password-validate']);
                    if(!preg_match('/^\w{3,}$/', $username)) {
                        show("<div class='text-white absolute'>Please use a username that is at least 3 letters.</div>");
                    } elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
                        show($password);
                        show($passwordValidate);
                        show("<div class='text-white absolute'>For password: at least one lowercase char, at least one uppercase char, at least one digit,at least one special sign of @#-_$%^&+=§!?</div>");
                    } elseif($password !== $passwordValidate){
                        show("Your passwords are not the same!");
                    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        show("<div class='text-white absolute'>Please specify a valid email</div>");
                    } elseif($userModel->checkUserCreds($username) !== 1) { 
                        show("<div class='text-white absolute'>username already exists!</div>");
                    } elseif($userModel->checkUserCreds($email) !== 1) {
                        show("<div class='text-white absolute'>email already exists!</div>");
                    } else {
                        $password = hashPassword($password);
                        $user = $this->model("user");
                        $user->registerInput([
                            "username" => $username,
                            "email" => $email,
                            "password" => $password
                        ]);

                        header("Location:".ROUTE."home");
                    }
                } else {
                    show("<div class='text-white absolute'>Please fill in all the fields</div>");
                }
            } else {
                show("<div class='text-white absolute'>CSRF Token not valid.</div>");
            }
        }
    }
}
