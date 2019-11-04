<?php

require '../bootloader.php';

$duomenys1 = [
    'name' => 'Trauktinė',
    'abarot' => 50,
    'amount_ml' => 450,
 
];
$duomenys2 = [
    'name' => 'Šampanas',
    'abarot' => 15,
    'amount_ml' => 250,
    'image' => 'https://www.buteliukas.lt/450-large_default/sampanas-mumm-cordon-rouge-brut-0375-l-.jpg'
];
$strongDrink = new App\Drinks\StrongDrink($duomenys1);
$lightDrink = new App\Drinks\LightDrink($duomenys2);    
var_dump($strongDrink);
var_dump($lightDrink);
$strongDrink->drink();
var_dump($strongDrink);
$lightDrink->drink();
var_dump($lightDrink);
$lightDrink->drink();
var_dump($lightDrink);
$lightDrink->drink();
var_dump($lightDrink);
var_dump($strongDrink->getImage());
var_dump($lightDrink->getImage());

 
 