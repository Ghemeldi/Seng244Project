<?php
session_start();
include("dbconnect.php");


$name = $_POST["name"];
$lastname = $_POST["lastname"];
$profession = $_POST["profession"];
$income = $_POST["income"];
$location = $_POST["location"];
$project = $_POST["project"];
$transport = $_POST["transport"];
$availability = $_POST["availability"];
$availablehours = $_POST["availablehours"];
$approved = $_POST["approved"];



$query = "INSERT INTO volunteers(volunteer_name,volunteer_lastname,volunteer_profession,volunteer_income,volunteer_location,volunteer_project,volunteer_transport_handle,volunteer_month_availability,volunteer_hours_availability,volunteer_approved,member_id) 
    VALUES('$name','$lastname','$profession','$income','$location','$project','$transport','$availability','$availablehours','$approved','{$_SESSION["member_id"]}')";
$result = mysqli_query($conn, $query);

//or die("DB write unsuccessful");
// if($result){
//    echo "Write successful";
// }
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteering Received!</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">We have received your request to volunteer.!</h1>
        <p class="mb-8">Once approved by an authorized person, you can access information about volunteer projects.</p>
        <a href="indexpage.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-green-700">Go Home</a>
    </div>
</body>

</html>