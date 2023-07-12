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
        $results = $bd-> query($query);
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
        $results = $bd-> query($query, [$data['Title'],
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
        $results = $bd->query($query, [$taskId]);
        
        if(!empty($results)) {
            return $results[0];
        } else {
            return "No hay ninguna tarea para editar";

        }

    }

    public function update($table, $taskId, $data){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd= new DatabaseConnection($server, $database, $user, $password);
        $bd->connect();
        $query ="UPDATE $table SET Title = ?, Description=?, Deadline = ? WHERE id = ? ";

        $bd->query($query, [$data ['Title'], $data['Description'], $data ['Deadline'], $taskId]);



    }

    public function destroy($table, $taskId){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd= new DatabaseConnection($server, $database, $user, $password);
        $bd->connect();
        $query ="DELETE FROM $table WHERE id = ? ";

        $results = $bd->query($query, $taskId);
        



    }

    public function done(){
        $server=$_ENV['SERVER'];
        $database=$_ENV['DATABASE'];
        $user=$_ENV['USER'];
        $password=$_ENV['PASSWORD'];

        $bd=new DatabaseConnection($server, $database, $user, $password);
        $bd->connect();
        $query="";
        $results= bd->query($query, );

    }

    }






?>