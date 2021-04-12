<?php

function dbConn(){
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=planning_tool", "root", "mysql");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }
    
