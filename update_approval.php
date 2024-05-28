<?php
include('../dbconnect.php');
// Get the volunteer ID and approval status from the POST data
$volunteerId = $_POST['id'];
$approvalStatus = $_POST['status'];

// Connect to the database


// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare('UPDATE volunteers SET volunteer_approved = ? WHERE volunteer_id = ?');
$stmt->bind_param('si', $approvalStatus, $volunteerId);

// Execute the statement
$stmt->execute();

// Close the connection
$conn->close();
