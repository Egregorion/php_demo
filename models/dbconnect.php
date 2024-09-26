<?php

function dbconnect() {
    try{
        $dbh = new PDO('mysql:host=localhost;dbname=dwwm_rodez', 'root', '');
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}