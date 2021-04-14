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





$cleanData = array(
    "0" => '',
    "1" => '',
    "2" => '',
    "3" => '',
    "4" => '',
);

$gameID;


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if( $_POST['nameData'] ) $result = search(); search(); $pressed = true;
       if($_POST['agendaToevoeg']){
        $counter = 0;
        $formResult = $_POST['agendaToevoeg'];
        foreach($formResult as $insertData){
            $cleanData[$counter] = dataClean($insertData);
            $counter++;
        }
    //   print_r($cleanData);
       }
    //   $counter = 0;
    //   foreach ($test as $username) {
    //       if (empty($username)) {
    //           $data[$counter] = dataClean($username);
    //           print_r($data);
    //       }
    //       $counter++;
    //   }
  }

