<?php

class Site extends model {

    public function fetchAll()
    {
        $data = $this->query("SELECT * FROM site");
        return $data;
    }

    public function updateSite($data)
    {
        $this->update($data, "site", "id", 1);
    }

}