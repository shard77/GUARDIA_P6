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

        $siteModel = $this->Model("site");
        $data = $siteModel->fetchAll();
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

        $siteModel = $this->Model("site");
        $data = $siteModel->fetchAll();
        $data['username'] = empty($_SESSION['user']) ? 'User':$_SESSION['user']['username'];
        $data['email'] = empty($_SESSION['user']) ? 'Mail':$_SESSION['user']['email'];

        if(!empty($_POST["site-update-submit"]) && $_POST['csrfToken'] === $_SESSION['csrf_token']) {
            if(!empty($_POST['homepagetext'])) {
                $sanitized = filter_var($_POST['homepagetext'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $siteModel->updateSite(['homepage_text' => $sanitized]);
                header("Location:".ROUTE."home");
            } 
            
            if(!empty($_FILES['avatar'])) {
                $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if(!in_array($_FILES['avatar']['type'], $allowed)) {
                    echo "Only jpeg, png, gif or webp are allowed.";
                } else {
                    $fileName = uniqid().$_FILES['avatar']['name'];
                    $filePath = ROUTE . "assets/img/" . $fileName;

                    move_uploaded_file($_FILES['avatar']['tmp_name'], $_SERVER["DOCUMENT_ROOT"]. "/php-site-school/public/assets/img/".$fileName);
                    $siteModel->updateSite(['user_avatar' => $filePath]);
                    header("Location:".ROUTE."home");
                }
            }
        }

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

        if(!empty($_POST['user-update-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                if(!empty($_POST['password']) || !empty($_POST['password-new'])) {
                    $password = trim($_POST['password']);
                    $passwordNew = trim($_POST['password-new']);

                    if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$passwordNew)) {
                        show("<div class='text-black absolute mt-12'>For password: at least one lowercase char, at least one uppercase char, at least one digit,at least one special sign of @#-_$%^&+=§!?</div>");
                    } elseif(password_verify($password, $data->password)) {
                        $userModel->updateUser($_SESSION['user']['id'], ['password' => password_hash($passwordNew, PASSWORD_BCRYPT)]);
                    } else {
                        show("Password is not valid");
                    }
                }

                if(!empty($_POST['username'])) {
                    $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                    if(!preg_match('/^\w{3,}$/', $username)) {
                        show("<div class='text-black absolute mt-12'>Username must be at least 3 characters long</div>");
                    } elseif($userModel->checkUserCreds($username) == 0){
                        show("<div class='text-black absolute mt-12'>username already exists!</div>");
                    } else {
                        $userModel->updateUser($_SESSION['user']['id'], ['username' => $username]);
                        header("Location:".ROUTE."home");
                    }
                }

                if(!empty($_POST['email'])) {
                    $email = trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        show("<div class='text-white absolute mt-12'>Email is not valid</div>");
                    } elseif($userModel->checkUserCreds($email) == 0){
                        show("<div class='text-black absolute mt-12'>email already exists!</div>");
                    } else {
                        $userModel->updateUser($_SESSION['user']['id'], ['email' => $email]);
                        header("Location:".ROUTE."home");
                    }
                }
            } else {
                show("CSRF token is not valid");
            }         
        }

		$this->viewArgs("settings", $data);
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

                if($user->admin == 1) {
                    $userModel->updateUser($value, ['admin' => 0]);
                } else {
                    $userModel->updateUser($value, ['admin' => 1]);
                }

                if($_SESSION['user']['id'] == $value) {
                    $_SESSION['user']['admin'] = $user->admin == 1 ? 0 : 1;
                }
                
                header("Location:".ROUTE."home/users");

            } else {
                show("CSRF token is not valid");
            }         
        }   

        if(!empty($_POST['projects-user-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                
                header("Location:".ROUTE."home/projectmanager/u".$value);

            } else {
                show("CSRF token is not valid");
            }
        }
    }

    public function projects() 
    {
    	$projectModel = $this->model("project");
		$projects = $projectModel->fetchAllProjects();

       	$this->viewArgs("projects", $projects);
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

    public function projectmanager($id)
    {
        if($_SESSION['user']['admin'] !== 1) {
            return header("Location:".ROUTE."home");
        } 

        if(str_starts_with($id, "u")) {
            $id = substr($id, strpos($id, "u") + 1);    
            $projectModel = $this->model("project");
            $data = $projectModel->fetchUserProjects($id);
            
            if(!empty($data)) {
                $this->viewArgs("project_manager_user", $data);
            } else {
                show("User hasn't any projects!");
            }
    
        } elseif(str_starts_with($id, "delete")){
            $id = substr($id, strpos($id, "pdelete") + 6);
            $projectModel = $this->model("project");
            $project = $projectModel->fetchProjectById($id);
            show($id);
            if(!$project) {
                return show("Project not existing");
            }

            $userId = $project->creator_id;
            $projectModel->deleteProject($id);
            header("Location:projectmanager/u".$userId);
            
        } elseif(str_starts_with($id, "edit")) {
            $id = substr($id, strpos($id, "edit") + 4);
            $projectModel = $this->model("project");
            $project = $projectModel->fetchProjectById($id);


            if(!empty($_POST['submit-post'])) {
                if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                    if(!empty($_POST["project-title"]) && !empty($_POST["project-content"])) {
                        $sanitizedTitle = filter_var( $_POST["project-title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $sanitizedContent = filter_var( $_POST["project-content"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        
                        $projectModel -> updateProject([
                            "title" => $sanitizedTitle,
                            "content" => $sanitizedContent
                        ], $id);
                        
                        header("Location:".ROUTE."home/projects/p".$id);
                    }
                }
            }

            $this->viewArgs("project_manager_edit", $project);
        }else {
            show("Invalid param");
        }
    }

    public function contact()
    {
        if(!empty($_POST['contact-submit'])) {
            if($_POST['csrfToken'] === $_SESSION['csrf_token']) {
                if(!empty($_POST['message']) && !empty($_POST['subject'])) {
                    $userModel = $this->model("user");
                    $user = $userModel->showUser($_SESSION['user']['id']);
                    $email_address = $user->email;
                    $sanitizedSubject = filter_var($_POST['subject'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $sanitizedMessage = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $contact_mail = "guiot.matthieu@live.fr";
                    $headers = "From: $contact_mail\n";
                    $headers .= "Reply-To: $email_address";

                    mail($contact_mail,$sanitizedSubject,$sanitizedMessage,$headers);
                    header("Location:".ROUTE."home");
                }
            } else {
                show("CSRF token is not valid");
            }         
        }
        $this->view("contact");
    }
}
