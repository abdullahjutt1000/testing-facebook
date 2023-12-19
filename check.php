<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "facebook") or die("connection Failed");

// $id = $_POST["id"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT * FROM fb_login WHERE f_email='$email' AND f_password='$password'";
$run = mysqli_query($conn, $query);
$row = mysqli_num_rows($run);
if ($result = mysqli_fetch_array($run)) {
    $id = $result['id'];
    $first_name = $result['first_name'];
    $last_name = $result['last_name'];
    $email = $result['f_email'];
    $f_gender = $result['f_gender'];
    $f_day = $result['f_day'];
    $f_month = $result['f_month'];
    $f_year = $result['f_year'];
}
if ($row > 0) {
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['id'] = $id;
    $_SESSION['login'] = $email;
    $_SESSION['f_gender'] = $f_gender;
    $_SESSION['f_day'] = $f_day;
    $_SESSION['f_month'] = $f_month;
    $_SESSION['f_year'] = $f_year;

    echo 1;
} else {
    echo 0;
}




?>