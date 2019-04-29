<?php 
$dsn = 'mysql:host=localhost; dbname=counselling';
$user = 'root';
$pass = '';
try{
    $pdo = new PDO($dsn, $user, $pass);
}catch(PDOException $e){
    echo ' COnnection error!'. $e->getMessage();
}


?>