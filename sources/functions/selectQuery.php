<?php 
    function selectAll(){
        $pdo = dbConn();
        $sth = $pdo->prepare("SELECT * FROM `gamelijst`");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function selectIndiviual($id){
        $pdo = dbConn();
        $sth = $pdo->prepare("SELECT * FROM `gamelijst` where id=:id");
        $sth->bindParam(":id", $id);
        $sth->execute();
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        print_r($data);
        return $data;
    }

?>