<?php

require_once 'Warrior.php';
require_once 'Mage.php';


$character = new Character();
$character->setName("Bob");
$character->setlife(50);
echo $character->introduce() . "<br><br>";

$warrior = new warrior(50, "Goldo" , 38);
echo $warrior->introduce();

$mage = new Mage(50, "Magic", 60);
echo $mage->introduce();
?>