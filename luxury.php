<?php
// Base class: Car
class Car {
    public $name;
    public $speed;

    public function __construct($name, $speed) {
        $this->name = $name;
        $this->speed = $speed;
    }

    // Method to simulate the car driving
    public function drive() {
        return $this->speed;
    }

    // Method to display car information
    public function displayInfo() {
        echo "{$this->name} is racing at {$this->speed} km/h.\n";
    }
}

// Subclass: SportsCar (Inherits from Car)
class SportsCar extends Car {
    public function __construct($name) {
        parent::__construct($name, rand(240, 320)); // High speed for sports cars
    }

    public function drive() {
        return $this->speed + rand(10, 30); // Sports cars get speed boosts
    }
}

// Subclass: SUV (Inherits from Car)
class SUV extends Car {
    public function __construct($name) {
        parent::__construct($name, rand(160, 220)); // SUVs have balanced speed
    }
}

// Subclass: LuxurySedan (Inherits from Car)
class LuxurySedan extends Car {
    public function __construct($name) {
        parent::__construct($name, rand(180, 240)); // High-end sedans are fast too
    }
}

// Race class to manage the race
class Race {
    private $cars = [];

    // Add a car to the race
    public function addCar(Car $car) {
        $this->cars[] = $car;
    }

    // Start the race and display results
    public function startRace() {
        echo "The luxury car race has started!\n\n";

        // Display information about each car
        foreach ($this->cars as $car) {
            $car->displayInfo();
        }

        echo "\n--- Results ---\n";

        // Determine the winner based on the highest speed
        $winner = null;
        $maxSpeed = 0;
        foreach ($this->cars as $car) {
            $carSpeed = $car->drive();
            echo "{$car->name} finished with a speed of {$carSpeed} km/h.\n";

            if ($carSpeed > $maxSpeed) {
                $maxSpeed = $carSpeed;
                $winner = $car;
            }
        }

        echo "\nThe winner is {$winner->name} with a speed of {$maxSpeed} km/h!\n";
    }
}

// Create a new Race instance
$race = new Race();

// Add different types of luxury cars to the race
$race->addCar(new SportsCar("Ferrari Roma"));
$race->addCar(new SUV("Range Rover Autobiography"));
$race->addCar(new LuxurySedan("Mercedes-Benz S-Class"));
$race->addCar(new SportsCar("Lamborghini Huracán"));
$race->addCar(new SUV("Porsche Cayenne Turbo"));

// Start the race
$race->startRace();
?>
