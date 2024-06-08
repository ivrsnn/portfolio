<?php

    $type = $_POST['type'];

    include_once 'dbConnection.php';

    if($type == "login"){
        $login_email = $_POST['email'];
        $login_password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$login_email' AND password = '$login_password'";
      
        $result = $conn->query($sql);

        if(($result->num_rows) > 0){
            $row = $result->fetch_assoc();

            $uname = $row['email'];
            $pword = $row['password'];

            $error = $message = "";
            if(($uname === $login_email) && ($pword === $login_password)){
                
                $error = false;
                $message = "login success";
                
            }
        }
        else{
            $error = true;
            $message = "incorrect email / password";
        }

        $data = array(
            "error" => $error,
            "message" => $message
        );
    }

    else if($type == "register"){
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
      
        if($firstName === "" || $lastName === "" || $email === "" || $phone === "" || $password === "") {
            $error = true;
            $message = "Please fill all fields";
        }
        else {

            $query = "SELECT * FROM users WHERE email = '$email'";

            $result = $conn->query($query);

            if(($result->num_rows) > 0){
                    $error = true;
                    $message = "This Email Already Exist !";
            }

            else {
                // Insert user data into the database
                $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES ('$firstName', '$lastName', '$email', '$phone', '$password')";
                                
                if ($conn->query($sql)) {
                    $error = false;
                    $message = "New record created successfully";
                } else {
                    $error = true;
                     $message = "Error: " . $sql . " - " . $conn->error;
                }
            }
        }
        
        $data = array(
            "error" => $error,
            "message" => $message
        );
    }

    echo json_encode($data);

?>