<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];

    
    echo "<h2>Payment Successful!</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Amount Paid:</strong> ₹$amount</p>";
    echo "<p><strong>Payment Method:</strong> $method</p>";
    echo "<br><h3>Thank you for your payment!</h3>";
}

else {
    echo "Invalid Access!";
}

?>