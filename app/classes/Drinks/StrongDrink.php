<?php

namespace App\Drinks;

class StrongDrink extends Drink {

    public function drink() {
        $this->setAmount($this->getAmount() - 50);
    }

    public function getImage() {
        return parent::getImage();
    }

}
