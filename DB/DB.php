<?php
/**
 * Created by PhpStorm.
 * User: dilya
 * Date: 2/4/2019
 * Time: 7:20 PM
 */

class DB
{

    private $servername = "localhost";
    private $dbName = "reservationsystem";
    private $username = "root";
    private $password = "";
    protected $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }


}