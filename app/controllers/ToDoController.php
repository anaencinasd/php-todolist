<?php

namespace App\Controllers;
require_once './config.php';
use Database\PDO\DatabaseConnection;

class ToDoController
{
    private $server;
    private $database;
    private $user;
    private $password;
    private $connection;


    public function __construct()
    {
        $this->server = $_ENV['SERVER'];
        $this->database = $_ENV['DATABASE'];
        $this->user = $_ENV['USER'];
        $this->password = $_ENV['PASSWORD'];

        $this->connection = new DatabaseConnection($this->server, $this->database, $this->user, $this->password);
        $this->connection->connect();
    }

    public function index($table, $sort = null)
    {
        $order = "";

        if ($sort == 'Date') {
            $order = "ORDER BY Deadline ASC";
        } else {
            $order = "ORDER BY id DESC";
        }

        $filter = "";

        if ($sort == 'pending') {
            $filter = "WHERE Done = 0";
        } elseif ($sort == 'complete') {
            $filter = "WHERE Done = 1";
        } elseif ($sort == 'next') {
            $filter = "WHERE Done = 0";
            $order = "ORDER BY id ASC";
        }

        $query = "SELECT * FROM $table $filter $order";
        $results = $this->connection->query($query);

        return $results;
    }

    public function store($table, $data)
    {
        $column = implode(', ', array_keys($data));
        $placeholder = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table ($column) VALUES ($placeholder)";
        $values = array_values($data);
        $this->connection->query($query, $values);
    }

    public function edit($table, $taskId)
    {
        $query = "SELECT * FROM $table WHERE id = ?";
        $results = $this->connection->query($query, [$taskId]);

        if (!empty($results)) {
            return $results[0];
        } else {
            return "No hay ninguna tarea para editar";
        }
    }

    public function update($table, $taskId, $data)
    {
        $query = "UPDATE $table SET Title = ?, Description=?, Deadline = ? WHERE id = ?";
        $this->connection->query($query, [$data['Title'], $data['Description'], $data['Deadline'], $taskId]);
    }

    public function destroy($table, $taskId)
    {
        $query = "DELETE FROM $table WHERE id = ?";
        $this->connection->query($query, $taskId);
    }

    public function done_update($table, $taskId, $done = 1)
    {
        $query = "UPDATE $table SET Done = ? WHERE id = ?";
        $this->connection->query($query, [$done, $taskId]);
    }
}
