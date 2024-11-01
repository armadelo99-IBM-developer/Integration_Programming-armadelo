<?php require_once "test.php"; ?>


<?php
$car1 = new Car("Toyota", "Corolla", 2020);
$car2 = new Car("Ford", "Mustang", 2022);

echo "<br/>";
echo $car1->getCarInfo(); // Outputs: This car is a 2020 Toyota Corolla.
echo "<br/>";
echo $car2->getCarInfo(); // Outputs: This car is a 2022 Ford Mustang.
?>
