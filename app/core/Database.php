<?php 

class Database 
{
    private function connect() 
    {
        $db = "mysql:hostname=".DB_HOST.";dbname=".DB_NAME;
        $conn = new PDO($db, DB_USER, DB_PASS);
        return $conn;
    }

    public function query($query, $data = [])
    {
        $conn = $this->connect();
        $stm = $conn->prepare($query);
        
        foreach ($data as $key => $value) {
            $stm->bindParam(":".$key, $data[$key]);
        }

        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }

        return false;
    }

    public function getRow($query, $data = [])
    {
        $conn = $this->connect();
        $stm = $conn->prepare($query);
        
        foreach ($data as $key => $value) {
            $stm->bindParam(":".$key, $data[$key]);
        }

        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result[0];
            }
        }

        return false;
    }
}
