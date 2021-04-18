<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_base = "login";

Global $pdo;

try{
    $pdo = new PDO("mysql:dbname=".$db_base."; host=".$db_host, $db_user, $db_pass);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo 'Erro: '.$e->getMessage();
    exit;
}
?>