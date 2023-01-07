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

        $data['username'] = empty($_SESSION['user']) ? 'User':$_SESSION['user']['username'];
        $data['email'] = empty($_SESSION['user']) ? 'Mail':$_SESSION['user']['email'];

        $_SESSION['LAST_ACTIVITY'] = time();
        $this->viewArgs("home", $data);
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

        $data['username'] = empty($_SESSION['user']) ? 'User':$_SESSION['user']['username'];
        $data['email'] = empty($_SESSION['user']) ? 'Mail':$_SESSION['user']['email'];
        $this->viewArgs("admin", $data);
    }

    public function users()
    {
        if($_SESSION['user']['admin'] !== 1) {
            return header("Location:".ROUTE."home");
        } 

        $user = $this->model("user");
        $data['users'] = $user->showUsers();
        $this->viewArgs("users", $data);
    }

    public function manage($value)
    {
        if($_SESSION['user']['admin'] !== 1) {
            return header("Location:".ROUTE."home");
        } 

        if(!empty($_POST['delete-user-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                $user = $this->model("user");
                $user->deleteUser($value);

                header("Location:".ROUTE."home/users");

            } else {
                show("CSRF token is not valid");
            }         
        }       

        if(!empty($_POST['admin-user-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                $userModel = $this->model("user");
                $user = $userModel->showUser($value);

                show($user->admin);

                if($user->admin == 1) {
                    $userModel->updateUser($value, ['admin' => 0]);
                } else {
                    $userModel->updateUser($value, ['admin' => 1]);
                }

                if($_SESSION['user']['id'] == $value) {
                    $_SESSION['user']['admin'] = $user->admin == 1 ? 0 : 1;
                    header("Location:".ROUTE."home");
                }
                
                header("Location:".ROUTE."home/users");

            } else {
                show("CSRF token is not valid");
            }         
        }   
    }

    public function posts() 
    {

       $this->view("posts");
    }
    
}
