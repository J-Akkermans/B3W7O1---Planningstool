<?php 
    function selectAll(){
        $pdo = dbConn();
        $sth = $pdo->prepare("SELECT * FROM `gamelijst`");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>