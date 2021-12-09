<?php

require 'class/default.php';
if (session_status() != 2) {
    session_start();
}   


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux Simpson</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
<main>
<?php
    
    
    if (empty($_SESSION['personnages'])) {
        var_dump('entrer');
        require './run.php';
        $homer->setHealth(60);
        $homer->eat('beer');
    
        $bart->setHealth(80);
        $bart->eat('donut');
    
        $lisa->setHealth(70);
        $lisa->eat('bean');
    
        $marge->setHealth(40);
        $marge->eat('bean');
    }
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    $homer = $_SESSION['personnages']['Homer'];
    foreach ($_SESSION['personnages'] as $personnage) {
        // unserialize($personnage);

        global $homer;
        echo '<div>';
        echo $personnage->getCompleteName() . ' | ' . $personnage->dateOfBirth . ' | ' . $personnage->gender . ' | ' . $personnage->getAge() . ' years old';
        echo '</br>';
        echo $personnage->getCompleteName() . ' is older than Homer ? : '. ($personnage->isOlder($homer) ? 'Yes' : 'No');
        echo '</br>';

        echo $personnage->getCompleteName() . ' eat ';
        $i = 1;
        foreach ($personnage->foodEated as $food) {
            echo $food;
            echo (count($personnage->foodEated) == $i ? '' : ', ');
            $i ++;
        }
        
        ($personnage->foodEated[0] ? end($personnage->foodEated) : 'Nothing');
        echo '</br>';

        echo 'Now his health is '. $personnage->health .' pdv';
        echo '</br>';

        echo $personnage->getCompleteName() . ' ran for 15 min, the personnage covered ' . $personnage->getDistance('15') . ' m';
        echo '</br>';
        echo '</div>';
        echo '</br>';




        // serialize($personnage);

    }
?>
<div class="actions">
    <button id="btn-run">Run</button>
    <button id="btn-sleep">Sleep</button>
    <div class="eat">
        <button id="btn-eat">Eat</button>
        <div class="food">
        <div>Donut</div>
        <div>Beer</div>
        <div>Bean</div></div>
    </div>
</div>
</main>


    
</body>
<script src='./javascript.js'></script>
</html>


