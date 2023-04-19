<?php
// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=todolist", "username", "password");

// Get the form data

$description = $_POST['description'];
$due_date = $_POST['due-date'];
$category = $_POST['category'];
$priority = $_POST['priority'];
$status = $_POST['status'];

// Insert the task into the database
$stmt = $pdo->prepare("INSERT INTO tasks (description, due_date, category, priority, status) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$description, $due_date, $category, $priority, $status]);

// Redirect back to the index page
header("Location: index.php");