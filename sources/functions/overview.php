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

            <div class="col-lg-4 col-sm-12 d-flex justify-content-center pb-2 pt-3">
            <div class="card" style="width: 32rem;">
                <img class="card-img-top img-fluid" src="sources/img/db_img/<?php echo $gameData['image']; ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title h3"><?php echo $gameData["name"]?></h5>
                    <?php echo $gameData["description"];?>
                    <a href="game.php?id=<?php echo $gameData["id"]?>&name=<?= $gameData["name"]?>" class="mt-auto btn btn-primary">Meer informatie</a>
                </div>
            </div>
            </div>
<?php
    }
    return $data;
}
?>
<html>

</html>
