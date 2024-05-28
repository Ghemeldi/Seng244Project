<?php
session_start();
include("dbconnect.php");



$location = $_POST["location"];
$project = $_POST["project"];
$member_name = $_POST["member_name"];
$member_lastname = $_POST["member_lastname"];
$member_mail = $_POST["member_mail"];
$member_birthdate = $_POST["member_birthdate"];
$member_address = $_POST["member_address"];

$donate_type = $_POST["donate_type"];
$donate_amount = $_POST["amount"];
$donation_date = $_POST["donation_date"];
$isShipped = $_POST["isShipped"];
if ($donate_type == "Money") {
    $material_type = "-";
    $shipping_type = "-";
} else if ($donate_type == "Material") {
    $material_type = $_POST["material_type"];
    $shipping_type = $_POST["shipping_type"];
}


$checkQuery = "SELECT donor_id FROM donors WHERE member_id = {$_SESSION["member_id"]}";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) == 0) {
    // The member does not exist in the donors table, so insert them
    $query = "INSERT INTO donors(donor_name,donor_lastname,donor_mail,donor_birthdate,donor_address,member_id) 
        VALUES('$member_name','$member_lastname','$member_mail','$member_birthdate','$member_address','{$_SESSION["member_id"]}')";

    $result = mysqli_query($conn, $query);
}

// $query = "INSERT INTO donors(donor_name,donor_lastname,donor_mail,donor_birthdate,donor_address,donor_password,member_id) 
//     VALUES('$member_name','$member_lastname','$member_mail','$member_birthdate','$member_address','$member_password','{$_SESSION["member_id"]}')";

// $result = mysqli_query($conn, $query);

$sql3 = "SELECT donor_id FROM donors WHERE member_id = {$_SESSION["member_id"]}";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        $donor_id = $row3["donor_id"];
    }
} else {
    echo "No data found in the database.";
}

$query2 = "INSERT INTO donations(donation_location,donation_project,donation_type,donation_amount,donation_material_type,donation_shipping_type,donor_id,donation_date, isShipped) 
    VALUES('$location','$project','$donate_type','$donate_amount','$material_type','$shipping_type','$donor_id','$donation_date','$isShipped')";

$result2 = mysqli_query($conn, $query2);

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donated!</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="img/aidlogo.png" />

</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">We have received your donation informations!</h1>
        <p class="mb-8">If you choose NGO Collecting for shipping type, NGO will contact with you.</p>
        <a href="indexpage.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-green-700">Go Home</a>
    </div>
</body>

</html>