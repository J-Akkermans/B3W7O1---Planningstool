<?php 
    require('sources/functions/db_connect.php');
    require('sources/functions/selectQuery.php');
    require('sources/functions/formHandle.php');
    $data = selectIndiviual($id);
    $dlc = explode(";", $data["expansions"]);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="sources/style.css">
    <title>Home</title>
</head>

<body>
    <?php include('sources/phpComp/header.php'); ?>
    <div class="container">
        <div class="row <?php echo $classHide?>">
            <div class="col-lg-12">
                <div class="alert alert-<?php echo $colorAlert?>" role="alert">
                    <?php echo $alertText?>
                </div>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-lg-4 d-flex flex-column justify-content-around">
                <h1><?= $data["name"]?></h1>
                <p><?= $data["description"]?></p>
                <button id="afspraakKnop" class="mt-auto btn btn-success w-100">Maak afspraak!</button>
            </div>
            <div class="col-lg-8 d-none mx-auto " id="formPop">
                <form class="col-lg-8 d-flex flex-column mb-0 justify-content-around" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
                    <div>
                        <label for="date" class="form-label">Datum</label>
                        <br>
                        <span> <?=$error[0]?></span>
                        <input type="date" name="afspraakInput[]" class="form-control" id="date">
                    </div>
                    <div>
                        <label for="time" class="form-label">Time</label>
                        <br>
                        <span> <?=$error[1]?></span>
                        <input type="time" name="afspraakInput[]" class="form-control" id="time">
                    </div>
                    <div>
                        <label for="uitlegger" class="form-label">Uitlegger</label>
                        <br>
                        <span> <?=$error[2]?></span>
                        <input type="text" name="afspraakInput[]" class="form-control" id="uitlegger">
                    </div>
                    <div>
                        <label for="spelers" class="form-label">Spelers</label>
                        <br>
                        <span> <?=$error[3]?></span>
                        <input type="text" name="afspraakInput[]" class="form-control" id="spelers">
                        <div class="form-text">Scheid namen met een , <span>Voorbeeld: Jan, Freek, Willemijn</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class=" rounded-0 w-25 btn btn-warning">Submit</button>
                        <button type="submit" id="voegToe" class=" rounded-0 w-75 btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <div id="removeVid" class=" col-lg-4  d-flex flex-column justify-content-around ">
                <?= $data['youtube']?>
            </div>
            <div id="removeImg" class=" col-lg-3 d-flex flex-column justify-content-around">
                <img class="w-100" src="sources/img/db_img/<?= $data['image']?>">
            </div>

        </div>
        <div class="row">
            <hr>
            <div class="col">
                <h4>Spelers</h4>
                <ul class="list-group ">
                    <li class="list-group-item d-flex  justify-content-between">Minimum spelers: <span
                            class="rounded badge bg-secondary p-2"> <?= $data["min_players"] ?> </span></li>
                    <li class="list-group-item d-flex  justify-content-between">Maximum spelers: <span
                            class="rounded badge bg-secondary p-2"> <?= $data["max_players"] ?> </span></li>
                </ul>
            </div>
            <div class="col">
                <h4>Tijd</h4>
                <ul class="list-group ">
                    <li class="list-group-item d-flex  justify-content-between">Uitleg: <span
                            class="rounded badge bg-secondary p-2"> <?= $data["explain_minutes"] ?> </span></li>
                    <li class="list-group-item d-flex  justify-content-between">Speeltijd: <span
                            class="rounded badge bg-secondary p-2"> <?= $data["play_minutes"] ?> </span></li>
                </ul>
            </div>
            <?php if($data["expansions"] != null){?>
            <div class="col">
                <h4>Uitbreidingspakketten</h4>
                <ul class="list-group ">
                    <?php foreach ($dlc as $value) { ?>
                    <li class="list-group-item"><?=$value;?></li>
                    <?php }?>
                </ul>
            </div>
            <?php }?>
            <div class="col">
                <h4>Extra</h4>
                <ul class="list-group ">
                    <li class="list-group-item d-flex  justify-content-between">Video: <span
                            class="rounded badge bg-secondary p-2"> <?= $data["explain_minutes"] ?> </span></li>
                    <li class="list-group-item d-flex  justify-content-between">Website: <span
                            class="rounded badge bg-secondary p-2"> <?= $data["play_minutes"] ?> </span></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include('sources/phpComp/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $("#afspraakKnop").click(function() {
            if (!$("#removeImg, #removeVid").hasClass("d-none")) {
                $("#removeImg, #removeVid").addClass("d-none");
                $("#formPop").removeClass("d-none");
                $("#afspraakKnop").attr('disabled', true);
            }
        });
        $("#voegToe").click(function() {
            if ($("#removeImg, #removeVid").hasClass("d-none")) {
                $("#removeImg, #removeVid").removeClass("d-none");
                $("#formPop").addClass("d-none");
            }
        });
    });
    </script>
</body>

</html>