<?php

class Database
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'app';

    public $dbh;
    public $error;

    function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->dbh->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            $this->error = $e;
            die($e);
        }
    }
}
