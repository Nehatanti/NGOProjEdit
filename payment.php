<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "ngo_donations");

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];

    $stmt = $conn->prepare(
        "INSERT INTO donations (name, email, amount, method)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssds", $name, $email, $amount, $method);

    if ($stmt->execute()) {
        echo "<h2 style='text-align:center;color:green;margin-top:50px'>
              Donation Successful. Thank you!
              </h2>";
    } else {
        echo "<h2 style='text-align:center;color:red;margin-top:50px'>
              Something went wrong.
              </h2>";
    }

    $stmt->close();
}

$conn->close();
?>
