<?php 

class Model extends Database 
{   

    public function insert($data, $table)
    {
        $query = "INSERT INTO ".$table." (";
        $values = "VALUES (";
        $i = 0;
        foreach ($data as $key => $value) {
            $query .= $key;
            $values .= ":".$key;
            if ($i < count($data) - 1) {
                $query .= ", ";
                $values .= ", ";
            }
            $i++;
        }

        $query .= ") ".$values.")";
        $this->query($query, $data);
    }
    
    public function update($data, $table, $where, $id)
    {
        $query = "UPDATE ".$table." SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            $query .= $key." = :".$key;
            if ($i < count($data) - 1) {
                $query .= ", ";
            }
            $i++;
        }
        $query .= " WHERE ".$where." = :id";
        $data['id'] = $id;
        $this->query($query, $data);
    }

    public function delete($table, $where, $id)
    {
        $query = "DELETE FROM ".$table." WHERE ".$where." = :id";
        $data['id'] = $id;
        $this->query($query, $data);
    }
}
