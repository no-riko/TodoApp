<?php

    require_once('Models/Todo.php');

    $todo = new Todo();

    $task = $_POST['task'];
    $lastId = $todo->create($task);
    $newtask = $todo->get($lastId);

    echo json_encode($newtask);
    exit();
    //echo json_encode('1');
    //echo $lastId;

    //header('Location: index.php');

?>