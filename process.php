<?php

@session_start();
include "server.php";


if(isset($_POST["sub"])){
    $fname = $_POST["fname"];
    $username = $_POST["username"];
    $password = $_POST["password"];

$sql = "INSERT INTO `schedule` (`fname`, `username`, `password`)VALUES('$fname', '$username', '$password')";
$result = mysqli_query($conn, $sql);

if($result){
    echo "Registration successful";
}else{
    die(mysqli_error($conn));
}
}


// ..............................................loghin....................
if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

$sql = "SELECT * FROM `schedule` WHERE `username`='$username' AND `password`='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $_SESSION['username'] = $username;
    
    header("location: index.php");

}else{
    echo "Invalid user details";
}
}


// ....................................................schedule..................................
if(isset($_POST["add"])){
    $schedule = $_POST["schedule"];
    $username = $_SESSION["username"];

$sql = "INSERT INTO `sched` (`schedule`, `username`)VALUES('$schedule', '$username')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Schedule added";
}else{
    die(mysqli_error($conn));
}
}


// .....................................................delete section...................
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

$sql = "DELETE FROM `sched` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Deleted";
}else{
    die(mysqli_error($conn));
}
}
?>