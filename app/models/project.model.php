<?php 

class Project extends Model
{
    public function fetchUserProjects($userId)
    {
        $project = $this->query("SELECT * FROM projects WHERE creator_id = :id", [
            "id" => $userId
        ]);

        return $project;
    }

    public function fetchProjectById($projectId)
    {
        $project = $this->getRow("SELECT * FROM projects WHERE id = :id", [
            "id" => $projectId
        ]);

        return $project;
    }

    public function createProject($data) 
    {
        $this->insert($data, "projects");
        return true;
    }
}
