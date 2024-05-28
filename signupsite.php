<?php
include("dbconnect.php");

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$birthdate = $_POST["birthdate"];
$address = $_POST["address"];
$phone= $_POST["phone"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
$isAdminValue = 0;
$date = date("Y-m-d");

// Check if user is at least 18 years old
$eighteenYearsAgo = date('Y-m-d', strtotime('-18 years'));
if ($birthdate > $eighteenYearsAgo) {
    // User is not at least 18 years old, redirect back
     // User is not at least 18 years old, show an alert
     echo '<!DOCTYPE html>
     <html>
     <head>
         <title>Age Verification</title>
         <script type="text/javascript">
             alert("You must be at least 18 years old.");
             window.history.back();
             </script>
     </head>
     <body>
     </body>
     </html>';
     exit();
}

// Check if email already exists
$checkEmailQuery = "SELECT * FROM members WHERE member_mail = '$email'";
$checkEmailResult = mysqli_query($conn, $checkEmailQuery);

if (mysqli_num_rows($checkEmailResult) > 0) {
    // Email already exists, redirect back
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Email Verification</title>
        <script type="text/javascript">
            alert("The email already exists.");
            window.history.back();
        </script>
    </head>
    <body>
    </body>
    </html>';
    exit();
}

$query = "INSERT INTO members(member_name,member_lastname,member_mail,member_birthdate,member_address,member_phone,member_password,member_date,is_admin) 
    VALUES('$name','$lastname','$email','$birthdate','$address','$phone','$password','$date','$isAdminValue')";
$result = mysqli_query($conn, $query);

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
        <h1 class="text-2xl font-bold mb-4">You've created your account!</h1>
        <p class="mb-8">Please login to continue.</p>
        <a href="login.html" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Login</a>
    </div>
</body>

</html>