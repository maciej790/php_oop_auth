<?php
require_once '../Controllers/TaskController.php';
header('Content-Type: application/json; charset=utf-8');

$task = new TaskController();

$task = new TaskController();
$id = $_GET['id'];
echo $task->getDataById($id);
