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
                    "email" => $user->email,
                    "admin" => $user->admin
                ];
                
                return true;
            }
        }

        return false;
    }

    public function showUsers()
    {
        $users = $this->query("SELECT * FROM users");
        return $users;
    }

    public function deleteUser($id)
    {
        $this->delete("projects", "creator_id", $id);
        $this->delete("users", "id", $id);
    }

    public function showUser($id)
    {
        $user = $this->getRow("SELECT * FROM users WHERE id = :id", [
            "id" => $id
        ]);

        return $user;
    }
    
    public function updateUser($id, $data)
    {
        $this->update($data, "users", "id", $id);

        $user = $this->getRow("SELECT * FROM users WHERE id = :id", [
            "id" => $id 
        ]);

        if ($user) {
            $_SESSION['user'] = [
                "id" => $user->id,
                "username" => $user->username,
                "email" => $user->email,
                "admin" => $user->admin
            ];
        }
    }

    public function checkUserCreds($data)
    {
        $data = $this->showUser($data);
        if(!$data) {
            return true;
        } else {
            return false;
        }
    }

}
