<?php

    require_once('config/dbconnect.php');

    class Todo{
        private $table = 'tasks';
        private $db_manager;

        public function __construct(){
            $this->db_manager = new DbManager();

            $this->db_manager->connect();
        }

        public function create($task){
            $stmt = $this->db_manager->dbh
            ->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
            $stmt->execute([$task]);
        }

        public function getAll(){
            $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
            $stmt->execute();
            $tasks = $stmt->fetchAll();

            return $tasks;
        }

        public function delete($id){
            //$id = h($task['id']);
            $stmt = $this->db_manager->dbh->prepare('DELETE FROM ' . $this->table . ' WHERE id = ?');
            $stmt->execute([$id]);
        }

        public function get($id){
            $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
            $stmt->execute([$id]);
            $task = $stmt->fetch();

            return $task;
        }

        public function update($task, $id){
            $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table . ' SET name = ?  WHERE id = ?');
            $stmt->execute([$task, $id]);
        }
    }

?>