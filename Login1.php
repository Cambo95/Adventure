<?php

session_start(); // Starting Session
echo "<p> starting session</p>";
$error=''; // Variable To Store Error Message

if (isset($_POST['email']) && isset($_POST['password'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}


//Define $username and $password
$email = $_POST['email'];
$password = $_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$password = stripslashes($password);
//$email = mysqli_real_escape_string($email);
//$password = mysqli__real_escape_string($password);
// SQL query to fetch information of registerd users and finds user match.
$query = "select * from logins where pword='".$password."' AND email='".$email."'";
$result = $db->query($query);
if(isset($result)){
$rows = $result->fetch_array();
//echo $rows['email'];
//  while () {
if (count($rows)> 0) {

$_SESSION['login_user'] = $email; // Initializing Session
header("location: authors.php"); // Redirecting To Other Page
} else {
$error = "Email or Password is invalid";
}
$result->close();
}
else{
echo "no results";
}

// }
}
?>