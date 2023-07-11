<?php

namespace App\Controllers;
require_once './config.php';

use Database\PDO\DatabaseConnection;
use DateTime;

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
        return ($results);
        
       
    
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

    public function edit($table, $taskId){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd = new DatabaseConnection($server, $database, $user, $password);
        $bd -> connect();

        $query = "SELECT * FROM $table WHERE id = ?";
        $results = $bd->execute_query($query, [$taskId]);
        if(!empty($results)){
            $data = $results->fetch();
            if($data === false){
                return "No hay ninguna tarea para editar";
            }
            return $data;
        } else {
            return "No hay ninguna tarea para editar";
        }

    }

    public function update($table, $column, $oldData, $newData){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd= new DatabaseConnection($server, $database, $user, $password);
        $bd->connect();
        $query ="UPDATE $table SET $column = ? WHERE $column = ? ";
        $results = $bd->execute_query($query, [$oldData, $newData]
);


    }

    public function destroy(){

    }


}



?>