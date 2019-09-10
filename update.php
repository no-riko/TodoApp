<?php

    require_once('Models/Todo.php');

    $todo = new Todo();

    $task = $_POST['task'];
    $id = $_POST['id'];

    $update = $todo->update($task, $id);

    header('Location: index.php');

?>