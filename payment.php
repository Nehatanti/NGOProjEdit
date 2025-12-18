<?php
$conn = new mysqli("localhost", "root", "", "ngo_donations");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['amount']) ||
        empty($_POST['method'])
    ) {
        die("All fields are required.");
    }

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $amount = (float) $_POST['amount'];
    $method = $_POST['method'];

    $stmt = $conn->prepare(
        "INSERT INTO donations (name, email, amount, method)
         VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

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
