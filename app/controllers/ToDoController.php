<?php

namespace App\Controllers;
require_once __DIR__ . '/../../config.php';
use Database\PDO\DatabaseConnection;


class ToDoController{
    public function index(){

    }

    public function create(){

    }

    public function store($data){
        $server=getenv('SERVER');
        $database=getenv('DATABASE');
        $user=getenv('USER');
        $password=getenv('PASSWORD');

        $bd=new DatabaseConnection ($server, $database, $user, $password);
        $bd->connect();
        $query = "INSERT INTO todo (Title, Description) VALUES (?, ?)";
        $results = $bd-> execute_query($query, [$data['Title'],
                                                $data['Description']]);
      
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