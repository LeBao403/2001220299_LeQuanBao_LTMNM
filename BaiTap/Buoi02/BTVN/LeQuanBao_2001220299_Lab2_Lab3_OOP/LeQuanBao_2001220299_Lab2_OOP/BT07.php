<?php
class Book {
    protected $title;
    protected $author;
    protected $price;

    public function __construct($title, $author, $price) {
        $this->title  = $title;
        $this->author = $author;
        $this->price  = $price;
    }

    public function showInfo() {
        echo "Book: " . $this->title . " by " . $this->author . ", Price: $" . $this->price . "<br>";
    }
}

interface Downloadable {
    public function download();
}

class EBook extends Book implements Downloadable {
    private $fileSize;

    public function __construct($title, $author, $price, $fileSize) {
        parent::__construct($title, $author, $price);
        $this->fileSize = $fileSize;
    }

    public function showInfo() {
        echo "E-Book: " . $this->title . " by " . $this->author . ", Price: $" . $this->price . ", Size: " . $this->fileSize . "<br>";
    }

    public function download() {
        echo "Downloading '" . $this->title . "' (" . $this->fileSize . ")...<br>";
    }
}

// ==== Demo ====
$book1 = new Book("PHP Basics", "Lê Bảo", 15);
$book1->showInfo();

$ebook1 = new EBook("Learn PHP OOP", "Lê Bảo", 20, "2MB");
$ebook1->showInfo();
$ebook1->download();
?>
