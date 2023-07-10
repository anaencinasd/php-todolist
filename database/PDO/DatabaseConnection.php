<?php
namespace Database\PDO;
require_once __DIR__ ."/../../config.php";


class DatabaseConnection {
    private $server;
    private $database;
    private $username;
    private $password;
    private $connection;

    public function __construct($server, $database, $username, $password){
        $this ->server = $server;
        $this ->database = $database;
        $this ->username = $username;
        $this ->password=$password;
    }

    public function connect(){
        $this->connection = new \PDO ("mysql:host=$this->server; dbname=$this->database", $this->username, $this->password);

        $set_names = $this->connection ->prepare("SET NAMES 'utf8'");
        $set_names->execute();
    }

    public function execute_query($query, $parameters = []){
        $statement = $this -> connection->prepare($query);
        $results = $statement ->execute ($parameters);
        return $results;
    }

}





?>