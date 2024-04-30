<?php
session_start();
require_once 'connection.php';

// Form submission handling
if(isset($_POST['submit'])){
    // Basic validation
    $errors = [];
    if(empty($_POST['name'])){
        $errors[] = "Name is required";
    }
    if(empty($_POST['email'])){
        $errors[] = "Email is required";
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if(empty($_POST['phone'])){
        $errors[] = "Phone number is required";
    }
    if(empty($_POST['location'])){
        $errors[] = "Location is required";
    }

    if(empty($_POST['password'])){
        $errors[] = "Password is required";
    }

    // If no validation errors, proceed with database insertion
    if(empty($errors)){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $password = $_POST['password'];

        // Prepare and bind SQL statement
        $sql = "INSERT INTO customer (c_name, c_email, c_phone, pass, c_location) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bind_param("ssiss", $name, $email, $phone, $password, $location);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $pdo->error;
        }

        // Close statement and connection
        $stmt->close();
        $pdo->close();
    } else {
        // Display validation errors
        foreach($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>