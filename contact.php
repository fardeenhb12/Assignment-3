<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("INSERT INTO contact_table (contact, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);


    if ($stmt->execute()) {
        echo "Thank you for your message! We have saved your information in the database.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }


    $stmt->close();
    $conn->close();
}
?>
