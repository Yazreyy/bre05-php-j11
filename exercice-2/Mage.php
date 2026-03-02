<?php

require_once 'Character.php';

class Mage extends Character {
    
public function __construct($life, $name, private int $mana)
{
    $this->life= $life;
    $this->name= $name;
}

public function getMana() : int {
    return $this->mana;
}

public function setMana(int $mana) : void {
    $this->mana = $mana;
}

public function introduce(): string
{
    return parent::introduce() . " et je suis un Mage avec : " . $this->life . " de vie et " . $this->mana . " de mana <br>"  ;
} 
    
    
}