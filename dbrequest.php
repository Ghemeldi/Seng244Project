<?php

include("dbconnect.php");


$indigent_name = $_POST['name'];
$indigent_lastname = $_POST['lastname'];
$indigent_phone = $_POST['phone'];
$indigent_address = $_POST['address'];
$indigent_income = $_POST['income'];
$indigent_peoplenumber = $_POST['peoplenumber'];
$indigent_children = $_POST['children'];

$education_statuses = array(); // Create an array to store the education statuses

for ($i = 0; $i < $indigent_children; $i++) {
    $education_status_key = 'education' . $i;
    if (isset($_POST[$education_status_key])) {
        $education_statuses[] = $_POST[$education_status_key]; // Add the education status to the array
    }
}
$education_status_string = implode(", ", $education_statuses); // Convert the array to a string

$indigent_employment = $_POST['employment'];
$indigent_expenditures = $_POST['expenditures'];
$indigent_support = $_POST['support'];






$query = "INSERT INTO indigents(indigent_name, indigent_lastname, indigent_phone, indigent_address, indigent_income, indigent_people_number, indigent_children_number, indigent_child_educational_status, indigent_employment, indigent_expenditures, indigent_needed_support) 
VALUES ('$indigent_name', '$indigent_lastname', $indigent_phone, '$indigent_address', '$indigent_income', '$indigent_peoplenumber', '$indigent_children','$education_status_string', '$indigent_employment', '$indigent_expenditures', '$indigent_support')";
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
    <title>Account Created</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="img/aidlogo.png" />

</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">We have received your aid request!</h1>
        <p class="mb-8">We will contact you.</p>
        <a href="index.html" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-green-700">Go Home</a>
    </div>
</body>

</html>