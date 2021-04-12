<?php 
function showOverview(){
    $counter = 0;
    $pdo = dbConn();
    $sth = $pdo->prepare("SELECT * FROM `gamelijst`");
    $sth->execute();
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    $divOpen = "<div class='row'>";
    $divClose = "</div>";
    echo $divOpen;
    foreach ($data as $gameData){
        $counter++;
        if($counter == 4){
            $counter = 1;
            echo $divClose;
            echo $divOpen;
        } ?>              
            <div class="col-lg-4 d-flex justify-content-center pb-2 pt-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../img/agendaIMG<?php echo $gameData["afbeelding"]?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $gameData["titel"]?></h5>
                    <p class="card-text"><?php echo $gameData["beschrijving"]; echo $counter;?></p>
                    <a href="#" class="btn btn-primary">Meer informatie</a>
                </div>
            </div>
            </div>
<?php
    }
    echo $counter;
    return $data;
}
