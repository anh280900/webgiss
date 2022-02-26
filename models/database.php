<?php
require_once ("config.php");
class database{
    private $conn = NULL;
    public function connect() {
        try
        {
            $this->conn = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PWD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->query('set names "utf8"');
        }
        catch(PDOException $ex )
        {
            die($ex->getMessage());
        }
        return $this->conn;
    }
}
?>