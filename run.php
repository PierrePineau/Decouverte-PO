<?php

$personnages = [
    $homer = new \App\Simpson('Homer', '1956-05-12', 'male'),
    $bart = new \App\Simpson('Bart','1980-02-23','male'),
    $lisa = new \App\Simpson('Lisa', '1982-05-09', 'female'),
    $marge = new \App\Simpson('Marge', '1956-01-01', 'female')
];

$building = [
    $house = new \App\Building('Maison', [$homer,$bart,$lisa,$marge], '12 street', 'Sprignfield', '49000', 'USA'),
    $factory = new \App\Building('Centrale', [$homer,$bart], '12 street', 'Sprignfield', '49000', 'USA')
];