<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Create a database connection (replace with your own database credentials)
    $host = "localhost";
    $username = "Amelia";
    $password = "Amelia";
    $database = "website";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform an SQL query to insert data into the "users" table
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>