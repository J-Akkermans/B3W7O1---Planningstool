<?php

require('sources/functions/db_connect.php');
require('sources/functions/selectQuery.php');
require('sources/functions/filterFunction.php');
require('sources/functions/insertFunction.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="sources/style.css">
    <title>Home</title>
</head>

<body>
    <?php include('sources/header.php'); ?>
    <div class="container mt-3">
        <div class="row align-items-start">
            <div class="col">
                <form method="post" id="zoekNaam">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Naam" name="nameData" aria-label="Naam">
                        <div class="input-group-append">
                            <button type="submit" name='naamZoeken' class="btn btn-primary border-right rounded-0">
                                <i class="icon-user icon-white"></i> Zoek
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                One of three columns
            </div>
            <div class="col">
                One of three columns
            </div>
            <div class="col">
                One of three columns
            </div>
        </div>
        <hr class="mt-2 mb-3" />
        <?php 
        if($pressed && is_Array($result)){ 
            ?>
        <div class="row">
            <div class="col-lg-4 col-sm-12 nopadding">
                <h2><?php echo $result["name"]; ?></h2>
                <img class="d-none d-lg-block d-xl-block img-fluid w-50" src="sources/img/<?php echo $result["image"];?>" alt="">
            </div>
            <div class="col-lg-4 col-sm-12 nopadding d-flex flex-column justify-content-around">
                <?php echo $result["description"]?>
                <button class="btn btn-success w-100 h-25" data-bs-toggle="modal" data-bs-target="#exampleModal">Plan nu!</button>
            </div>
            <div class="col-lg-4 col-sm-12 d-flex flex-column justify-content-around">
            <div class="embed-responsive embed-responsive-16by9">
                <?php echo $result['youtube'] ?>
                </div>
            </div>

        </div>
        <hr class="mt-2 mb-3" />
        <div class="row d-flex">
            <div class="col p-3">
                <div class="d-flex flex-column">
                    <span class="h5">Skills</span>
                    <ul class="noDots nopadding"><?php 
                    $qualites = explode(";", $result["skills"]);
                     foreach ($qualites as $skill){
                ?>
                        <li>
                            <?php echo $skill ?>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="col p-3">
                    <span class="h5">Player information</span>
                    <ul class="noDots nopadding">
                        <li class="d-flex justify-content-between">
                            <span>Minimum</span> <span> <?php echo $result["min_players"]  ?> </span>
                        </li>
                        <li class="d-flex justify-content-between">
                        <span>Maximum</span> <span> <?php echo $result["max_players"]  ?> </span>
                        </li>
                        
            </ul>
            </div>
            <div class="col p-3">
                    <span class="h5">Tijd informatie</span>
                    <ul class="noDots nopadding">
                        <li class="d-flex justify-content-between">
                            <span>Speel minuten </span><span><?php echo $result["play_minutes"] ?> </span>
                        </li>
                        <li class="d-flex justify-content-between">
                        <span>Uitleg</span> <span><?php echo $result["explain_minutes"] ?> </span>
                        </li>
                        
            </ul>
            </div>
            <?php if (array_key_exists('expansions', $result) && $result["expansions"] != null) {?>
            <div class="col p-3">
                    <span class="h5">Uitbreidingspakketten</span>
                    <ul class="noDots nopadding"><?php 
                    $expansion = explode(";", $result["expansions"]);
                     foreach ($expansion as $dlc){
                ?>
                        <li>
                            <?php echo $dlc ?>
                        </li>
                        <?php }?>
                    </ul>
            </div>
            <?php }?>
        </div>
        <?php } ?>
    </div>





















<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $result["name"] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
  <div class="mb-3">
    <label for="dateInput" class="form-label">Datum:</label>
    <input type="date" name="agendaToevoeg[]" class="form-control" id="dateInput">
  </div>
  <div class="mb-3">
    <label for="dateInput" class="form-label">Tijd:</label>
    <input type="time" name="agendaToevoeg[]" class="form-control" id="dateInput">
  </div>
  <div class="mb-3">
    <label for="Uitlegger" class="form-label">Uitlegger</label>
    <input type="text" name="agendaToevoeg[]" class="form-control" id="Uitlegger">
  </div>
  <div class="mb-3">
    <label for="Uitlegger" class="form-label">Spelers</label>
    <input type="text" name="agendaToevoeg[]" class="form-control" id="Uitlegger">
    <input type="text" name="agendaToevoeg[]" value="<?php echo $result["id"]?>"class="d-none" id="Uitlegger">
    <div class="form-text">Gebruik een , om namen te splitsen. <br> Voorbeeld: Jan,Pieter,Freek</div>
  </div>
      <div class="modal-footer">
        <button type="submit" name="voegDataToe" class="btn btn-success">Voeg toe!</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
</form>
      </div>




    </div>
  </div>
</div>

    <?php include('sources/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>