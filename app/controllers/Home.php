<?php

class Home extends Controller
{
    public function index()
    {

        if (!checkSession()) {
            header("Location:".ROUTE."login");
        }

        if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            session_unset();
            session_destroy();
        }

        // $data['username'] = empty($_SESSION['user']) ? 'User':$_SESSION['user']->username;
        $_SESSION['LAST_ACTIVITY'] = time();
        $this->view("home");
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location:".ROUTE."login");
    }

    public function admin()
    {
        if($_SESSION['user']['admin'] !== 1) {
            return header("Location:".ROUTE."home");
        } 

        $this->view("admin");
    }
}
