<?php

    require_once('Models/Todo.php');
    require_once('function.php');

    $todo = new Todo();

    $id = $_GET['id'];
    $delete = $todo->delete($id);

    header('Location: index.php');

?>