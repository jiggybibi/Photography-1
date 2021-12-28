<?php 
    //development connection
    // $host = '127.1.0.1';
    // $db = 'photography_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    //remote database connection
    $host = 'bsc5mqbgau2hr6kfrnbz-mysql.services.clever-cloud.com';
    $db = 'bsc5mqbgau2hr6kfrnbz'; 
    $user = 'unt3t46cqe6ew928';
    $pass = 'kfvflcgjlohsdzqtvftg';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        echo 'Hi Database';
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOexception $e) {
        echo"<h1 class='text-danger'>No Database Found</h1>";
        //throw new PDOexception($e->getmessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");
?>