<?php

namespace App\Controllers;
require_once './config.php';

use Database\PDO\DatabaseConnection;


class ToDoController{
    public function index($table){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd=new DatabaseConnection ($server, $database, $user, $password);
        $bd->connect();
        $query = "SELECT * FROM $table "; 
        $results = $bd-> get_data($query);
        var_dump($results);
       
    
    }

    public function create(){

    }

    public function store($table, $data){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd=new DatabaseConnection ($server, $database, $user, $password);
        $bd->connect();
        $query = "INSERT INTO $table (Title, Description, Deadline) VALUES (?, ?, ?)";
        $results = $bd-> execute_query($query, [$data['Title'],
                                                $data['Description'],
                                                $data ['Deadline']]);
      
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }


}



?>