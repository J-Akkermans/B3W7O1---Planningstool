<?php 
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$alertText = "";
$classHide = "";
$colorAlert= "";
$error = array("","","","");
$insertData = array();
$check = array(false,false,false,false);
$verified = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $array = $_POST["afspraakInput"];
    $counter = 0;
    foreach($array as $waarde){
        if(!empty($waarde)) {
            $insertData[$counter] = cleanData($waarde);
            $check[$counter] = true;
        }
        $counter++;
    }
    if((count(array_unique($check)) === 1) and in_array(true, $check, true) === false){
        $colorAlert = "danger";
        $alertText = "Het veld is niet correct ingevuld probeer het opnieuw.";
    }else{
        
        $colorAlert = "success";
        $alertText = "De agenda is geupdated.";
    }
}


function insert($array){
    $players = explode(",", $array[3]);
    print_r($players);
    $playersString = implode("/", $players);
    $pdo = dbConn();
    $sth = $pdo->prepare("INSERT INTO agenda (gameNaam, datum, tijd, Uitlegger, Spelers, gameID)
    VALUES (:gamenaam, :date, :time, :uitlegger,:spelers, :gameID)");
    $sth->execute(array(
        ':gamenaam' => $_GET['name'],
        ':date' => $array[0],
        ':time' => $array[1],
        ':uitlegger' => $array[2],
        ':spelers' => $playersString,
        'gameID' => $_GET['id'], 
       ));
}
