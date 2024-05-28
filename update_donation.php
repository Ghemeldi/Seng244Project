<?php
include("../dbconnect.php");




// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$donationId = $_POST['donationId'];
$isShipped = $_POST['isShipped'];

$sql = "UPDATE donations SET isShipped = ? WHERE donation_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $isShipped, $donationId);

$stmt->execute();

$stmt->close();
$conn->close();
