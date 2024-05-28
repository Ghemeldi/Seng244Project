<?php
// Include the database connection file
include '../dbconnect.php';

// Get the projectId and new values from the POST request
$projectId = $_POST['projectId'];
$money = $_POST['money'];
$medical = $_POST['medical'];
$food = $_POST['food'];
$clothing = $_POST['clothing'];

// Create an SQL statement to update the values in the database
$sql = "UPDATE projects SET project_need_money = $money, project_need_medical = $medical, project_need_food = $food, project_need_clothing = $clothing WHERE project_id = $projectId";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

$conn->close();
