<?php

abstract class PassengerCar {

    //visi sie properciai bus paveldimi
    protected $manufacturer;
    protected $model;
    protected $yaer;
    protected $wheel_count;
    protected $door_count;

    public function __construct($manufacturer, $model, $year, $wheel_count, $door_count) {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->year = $year;
        $this->wheel_count = $wheel_count;
        $this->door_count = $door_count;
    }

    abstract public function drive();

    public function getWheels() {
        print "$this-><$model> turi <$whell_count> ratus";
    }

    public function getDoors() {
        print "$this-><$model> turi <$whell_count> ratus";
    }

}

abstract class Toyota extends PassengerCar {

    protected $manufacturer = 'Toyota';

    public function __construct($model, $year, $wheel_count, $door_count) {
        parent::__construct('Toyota', $model, $year, $wheel_count, $door_count);
    }

}

class Corolla extends Toyota {

    public function __construct($yaer) {

        parent::__construct('Corolla', $yaer, 4, 2);
    }

    public function drive() {

        print 'Corolla vaziuoja neprastai';
    }

}

$car = new Corolla(1989);
//varr_dump

var_dump($car);
$car->drive();


