<?php 

class Post extends Model
{
    public function fetchPost($id)
    {
        $post = $this->getRow("SELECT * FROM posts WHERE id = :id", [
            "id" => $id
        ]);

        return $post;
    }
}
