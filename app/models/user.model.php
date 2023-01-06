<?php 

class User extends Model
{
    public function registerInput($data)
    {
        $this->insert($data, "users");
        return true;
    }

    public function loginInput($data)
    {
        $user = $this->getRow("SELECT * FROM users WHERE username = :username", [
            "username" => $data['username']
        ]);

        if ($user) {
            if (password_verify($data['password'], $user->password)) {
                $_SESSION['user'] = [
                    "id" => $user->id,
                    "username" => $user->username,
                    "email" => $user->email
                ];
                
                show($_SESSION['user']);
                return true;
            }
        }

        return false;
    }

    public function logout() 
    {
        session_unset();
        session_destroy();
        header("Location:".ROUTE."login");
    }
}
