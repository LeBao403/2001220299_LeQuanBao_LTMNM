<?php
namespace App\Students;

class Student extends Person {
    private string $studentID;

    public function __construct(string $name, int $age, string $studentID) {
        parent::__construct($name, $age);
        $this->studentID = $studentID;
    }

    public function getStudentID(): string {
        return $this->studentID;
    }

    public function displayInfo(): void {
        echo "ID: {$this->studentID}, Name: {$this->getName()}, Age: {$this->getAge()}";
    }
}

?>
