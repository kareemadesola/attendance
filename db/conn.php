<?php 
// Development Connection
    $host = '127.0.0.1';
    $db = 'attendance_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4'; 

// Remote Database Connection
    // $host = 'remotemysql.com';
    // $db = 'mxQEpmPp0U';
    // $user = 'mxQEpmPp0U';
    // $pass = 'F5hLEq4NvO';
    // $charset = 'utf8mb4'; 
     
// dsn data source name odcb instance
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php'; 
    require_once 'user.php'; 

    $crud = new Crud($pdo);
    $user = new User($pdo);

    $user->insertUser('admin','password');



?>