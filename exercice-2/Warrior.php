<?php
require_once 'Character.php';

class Warrior extends Character {
    

public function __construct(int $life, string $name, private int $energy )
{
    $this->life = $life;
    $this->name = $name;
}

public function getEnergy() : int {
    return $this->energy;
}

public function setEnergy( int $energy) : void {
    $this->energy = $energy;
}

public function introduce(): string
{
    return parent::introduce() . " et je suis un Guerrier avec : " .  $this->life . " de vie et " . $this->energy . " d'energy  <br>" ;
} 
    
    
}