<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $phone_code = $_POST['phone_code'];
    $profession = $_POST['profession'];
    $related_to_iwsa = $_POST['related_to_iwsa'];
    $password = $_POST['password'];
    $payment_method = $_POST['payment_method'];

    // Database connection
    $host = "localhost";
    $dbUsername = "sanchi";
    $dbPassword = "!@#qwe";
    $dbname = "register_";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO users (name, email, phone, phone_code, profession, related_to_iwsa, password, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssssss", $username, $email, $phone, $phone_code, $profession, $related_to_iwsa, $password, $payment_method);
            $stmt->execute();
            echo "Registration successful!";
        } else {
            echo "Email already exists!";
        }

        $stmt->close();
        $conn->close();
    }
?>
