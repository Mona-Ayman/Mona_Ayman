<?php
namespace  APP\DB\Config;
class Connection{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ecommerce";
    public $con ;
    public function __construct()
    {
        $this->con = new \mysqli($this->hostname,$this->username,$this->password,$this->database);
    }
    public function __destruct()
    {
        $this->con->close(); 
    }
}