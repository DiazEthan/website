<?php

class DiaE_DB_Access {

    private $mysqli;

    public function __construct() {

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "students";

        $this->mysqli = new mysqli($host, $user, $pass, $db);

        if ($this->mysqli->connect_error) {
            die("Connection Failed: " . $this->mysqli->connect_error);
        }
    }

    /* Show All Databases */
    public function showDatabases() {

        $query = "SHOW DATABASES";
        return $this->mysqli->query($query);
    }

    /* Show Tables in Students Database */
    public function showTables() {

        $query = "SHOW TABLES FROM students";
        return $this->mysqli->query($query);
    }

    /* Show Records From Your Table */
    public function displayRecords($table) {

        $query = "SELECT * FROM $table";
        return $this->mysqli->query($query);
    }

    public function selectOne($table, $id) {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = $this->mysqli->query($query);

        if(!$result){
            die("Error running query [" . $this->mysqli->error ."]");
        }

        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
        else{
            return null;
        }
    }
}
?>