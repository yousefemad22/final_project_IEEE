<?php 
$dsn = "mysql:host=localhost;dbname=restaurant";
$user = 'root';
$pass = '';

try{
    $con = new PDO($dsn,$user,$pass);
}catch(PDOException $ex){
    echo $ex->getMessage();
}
?>