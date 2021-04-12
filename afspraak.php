<?php

require('sources/functions/db_connect.php');
require('sources/functions/selectQuery.php');
require('sources/functions/filterFunction.php');




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
        if($pressed){ 
            ?>
        <div class="row">
            <div class="col nopadding">
                <h2><?php echo $result["name"]; ?></h2>
                <img class="img-fluid w-50" src="sources/img/<?php echo $result["image"];?>" alt="">
            </div>
            <div class="col nopadding d-flex flex-column justify-content-around">
                <?php echo $result["description"]?>
                <button class="btn btn-primary w-100">Plan nu!</button>
            </div>
            <div class="col ">
                <?php echo $result['youtube'] ?>
            </div>

        </div>
        <hr class="mt-2 mb-3" />
        <div class="row d-flex">
            <div class="col">
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
            <div class="col">
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
            <div class="col">
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


        </div>
        <?php } ?>
    </div>



    <?php include('sources/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>