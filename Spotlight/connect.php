<?php
    // Bringing the data.
    $name = $_POST['full-name-signup'];
    $email = $_POST['email-signup'];
    $password = $_POST['password-signup'];
    $username = $_POST['username-signup'];
    $code = $_POST['referral-code-signup'];

    // Database Connection.
    $conn = new mysqli('localhost', 'root', 'A11229867540a0@12', 'Spotlight');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Prepare and execute SQL statement
        $stmt = $conn->prepare("INSERT INTO registration (full_name, email, password, username, referral_code) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $password, $username, $code); // Corrected variable names and types
        if ($stmt->execute()) {
            echo "Sign-up Successful.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
?>
