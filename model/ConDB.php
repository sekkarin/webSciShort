<?php
class ConDB
{
    private $host, $db, $user, $pass;
    public $conn;

    public function ConDB()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'sci_course';
    }

    public function connect()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=sci_course', "root", "");
            // $this->conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>