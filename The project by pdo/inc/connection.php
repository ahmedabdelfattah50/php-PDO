<?php 

try{
    $con = new PDO("mysql:host=localhost;dbname=irapp", "root", "" , [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES  => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch(PDOException $e){
    die($e->getMessage());
}