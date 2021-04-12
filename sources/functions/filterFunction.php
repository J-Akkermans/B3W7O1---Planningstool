<?php


function dataClean($Data){
    $data = trim($Data);
    $data = stripslashes($Data);
    $data = htmlspecialchars($Data);
    return $data;
}

$pressed = false;
function search(){
    $searchData = dataClean($_POST['nameData']);
    $pdo = dbConn();
    $sth = $pdo->prepare("SELECT * FROM `gamelijst` WHERE `name` LIKE '%{$searchData}%'");
    $sth->execute();
    $data = $sth->fetch(PDO::FETCH_ASSOC);
    return $data;

}





  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if( $_POST['nameData'] ) $result = search(); search(); $pressed = true;

  }