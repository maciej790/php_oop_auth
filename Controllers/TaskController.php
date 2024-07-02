<?php

require_once '../Model/Database.php';

class TaskController extends Database
{

    public $data = [];

    public function getAllData()
    {
        $sql = "SELECT tasks.title FROM tasks LEFT JOIN users ON user_id = user_id WHERE login='adam' ";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $this->data = [
            'status' => 200,
            'data' => $results,
        ];
        return json_encode($this->data);
    }

    public function getDataById($id)
    {
        if (!empty($id)) {

            $sql = "SELECT * FROM tasks WHERE task_id=:id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(['id' => $id]);
            $results = $stmt->fetchAll();
            $this->data = [
                'status' => 200,
                'data' => $results,
            ];
            return json_encode($this->data);
        } else {
            $this->data = [
                'status' => 422,
                'message' => "All fileds are required!",
            ];

            return json_encode($this->data);
        }
    }

    public function addNewTask($requestData)
    {
        $title = $requestData['title'];

        if (!empty($title)) {
            $sql = 'INSERT INTO tasks (id, title) VALUES (:id, :title)';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(['id' => null, 'title' => $title]);

            if ($stmt) {
                $this->data = [
                    'status' => 200,
                    'message' => "Task was added!",
                ];

                return json_encode($this->data);
            } else {
                $this->data = [
                    'status' => 500,
                    'message' => "An Server Error!",
                ];

                return json_encode($this->data);
            }
        } else {
            $this->data = [
                'status' => 422,
                'message' => "All fileds are required!",
            ];

            return json_encode($this->data);
        }
    }

    public function updateTask($id, $newValue)
    {
        $sql = "UPDATE tasks SET title=:newValue WHERE id=:id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['newValue' => $newValue, 'id' => $id]);
        $results = $stmt->execute();
        if (!empty($newValue) || !empty($newValue)) {
            if ($results) {
                $this->data = [
                    'status' => 200,
                    'message' => "Successful updated!",
                ];
                return json_encode($this->data);
            } else {
                $this->data = [
                    'status' => 500,
                    'message' => "An Server Error!",
                ];

                return json_encode($this->data);
            }
        } else {
            $this->data = [
                'status' => 422,
                'message' => "All fileds are required!",
            ];
            return json_encode($this->data);
        }
    }

    public function deleteTask($id)
    {
        $sql = "DELETE FROM tasks WHERE id=:id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['id' => $id]);
        $results = $stmt->execute();
        if (!empty($id)) {
            if ($results) {
                $this->data = [
                    'status' => 200,
                    'message' => "Task was deleted!",
                ];
                return json_encode($this->data);
            } else {
                $this->data = [
                    'status' => 500,
                    'message' => "An Server Error!",
                ];

                return json_encode($this->data);
            }
        } else {
            $this->data = [
                'status' => 422,
                'message' => "All fileds are required!",
            ];
            return json_encode($this->data);
        }
    }
}
