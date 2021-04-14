<?php

function voegToe(){
    $pdo = dbConn();
    $sth = $pdo->prepare("INSERT INTO agenda (gameNaam, datum, tijd, Uitlegger, Spelers, gameID)
    VALUES (:gamenaam, :date, :time, :uitlegger,:spelers, SELECT `ìd` FROM gamelijst WHERE name='Counterfeiters')");
    $sth->execute(array(
        ':gamenaam' => 'test',
        ':date' => 'test1',
        ':time' => 'test2',
        ':uitlegger' => 'test3',
        ':spelers' => 'test4' 
       ));
}



?>