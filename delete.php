<?php

    require_once('Models/Todo.php');
    //require_once('function.php');

    $todo = new Todo();

    $id = $_GET['id'];
    $delete = $todo->delete($id);

    echo json_encode('1');

    //header('Location: index.php');

?>