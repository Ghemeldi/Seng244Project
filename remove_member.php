<?php
include("../dbconnect.php");
$member_id = $_POST['member_id'];



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM members WHERE member_id = $member_id";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error deleting member: " . $conn->error;
}
$conn->close();
