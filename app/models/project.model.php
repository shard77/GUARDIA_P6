<?php 

class Project extends Model
{
    public function fetchProject($id)
    {
        $post = $this->getRow("SELECT * FROM posts WHERE id = :id", [
            "id" => $id
        ]);

        return $post;
    }

    public function createProject($data) 
    {
        $this->insert($data, "posts");
        return true;
    }
}
