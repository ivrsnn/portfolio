<?php
    include_once 'dbConnection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['signup_email'];
        $phone = $_POST['phone'];
        $password = $_POST['signup_password'];
      
        // Insert user data into the database
        $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES ('$firstName', '$lastName', '$email', '$phone', '$password')";
      
        if ($conn->query($sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      
        $conn->close();
      }
      
?>