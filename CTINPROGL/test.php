<?php
class Car {
    public $make;
    public $model;
    public $year;

    function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    function getCarInfo() {
        return "This car is a $this->year $this->make $this->model.";
    }
}
?>

<?php

$myCar = new Car("Honda", "Civic", 2021);

echo $myCar->getCarInfo();
?>
