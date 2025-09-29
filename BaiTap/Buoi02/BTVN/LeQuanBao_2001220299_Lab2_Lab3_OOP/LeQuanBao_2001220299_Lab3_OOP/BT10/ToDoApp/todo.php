<?php
require_once "TodoManager.php";

$manager = new TodoManager("todos.json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["task"]) && $_POST["task"] !== "") {
        $manager->add($_POST["task"]);
    }
}

if (isset($_GET["toggle"])) {
    $manager->toggle($_GET["toggle"]);
}

if (isset($_GET["delete"])) {
    $manager->delete($_GET["delete"]);
}

header("Location: index.php");
exit;
