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

    public function settings()
    {
        if(!checkSession()) {
            return header("Location:".ROUTE."login");
        } 

        $userModel = $this->model("user");
        $data = $userModel->showUser($_SESSION['user']['id']);
        $this->viewArgs("settings", $data);

        if(!empty($_POST['user-update-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                if(!empty($_POST['password']) || !empty($_POST['password-new'])) {
                    if(password_verify($_POST['password'], $data->password)) {
                        $userModel->updateUser($_SESSION['user']['id'], ['password' => password_hash($_POST['password-new'], PASSWORD_BCRYPT)]);
                    } else {
                        show("Password is not valid");
                    }
                }
                if(!empty($_POST['username'])) {
                    $userModel->updateUser($_SESSION['user']['id'], ['username' => $_POST['username']]);
                    show("Username updated");
                }
                if(!empty($_POST['email'])) {
                    $userModel->updateUser($_SESSION['user']['id'], ['email' => $_POST['email']]);
                    show("Email updated");
                }

            } else {
                show("CSRF token is not valid");
            }         
        }
    }

    public function create()
    {
        if(!empty($_POST['project-creation-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                if(!empty($_POST['project-creation-title']) || !empty($_POST['project-creation-content'])) {
                    $projectModel = $this->model("project");
                    $projectModel->createProject([
                        "title" => $_POST['project-creation-title'],
                        "content" => $_POST['project-creation-content'],
                        "creator_id" => $_SESSION['user']['id'],
                    ]);
        
                    header("Location:".ROUTE."home");
                } else {
                    show("Please fill all fields");
                }
            } else {
                show("CSRF token is not valid");
            }         
        }
        $this->view("project_creation");
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

    public function projects() 
    {
       $this->view("projects");
    }

    public function userprojects($userId)
    {   
        $userId = substr($userId, strpos($userId, "u") + 1);    

        $projectModel = $this->model("project");
        $data = $projectModel->fetchUserProjects($userId);
        
        if(!empty($data)) {
            $this->viewArgs("projects_user", $data);
        } else {
            show("User hasn't any projects!");
        }
    }    

    public function projectdetail($projectId)
    {   
        $projectId = substr($projectId, strpos($projectId, "p") + 1);    

        $projectModel = $this->model("project");
        $data = $projectModel->fetchProjectById($projectId);
        
        $userModel = $this->model("user");
        if(!empty($data)) {
            $user = $userModel->showUser($data->creator_id);
            $data->creator_name = $user->username;
            $this->viewArgs("project_detail", $data);
        } else {
            show("Project not existing");
        }
      
    }
}
