<?php
    class car {
        public $brand;
        public $color;

        public function __construct($brand, $color) {
            $this->brand = $brand;
            $this->color = $color;
        }

        public function show_info(){
            echo "Brand: " . $this->brand . ", Color: " . $this->color . "<br>";
        }
    }

    $car1 = new car("Toyota", "Red");
    $car2 = new car("Honda", "Blue");

    $car1->show_info();
    $car2->show_info();

?>

