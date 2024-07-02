<?php
require_once '../Controllers/TaskController.php';
header('Content-Type: application/json; charset=utf-8');

error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$task = new TaskController();

$formData = json_decode(file_get_contents("php://input"), true);
$insertedRecord = $task->addNewTask($formData);
echo $insertedRecord;
