<?php 
include '../template/database.php';
session_start();
if(empty($_POST['login']) || empty($_POST['fio']) || empty($_POST['password'])
|| empty($_POST['email']) || empty($_POST['password_repeat'])){ 
    $_SESSION = $_POST;
    $_SESSION['error'] = "Не все поля заполнены";
    header('location: ../registr.php');
    exit;
}
$login = $_POST ['login'];
$fio = $_POST ['fio'];
$password = $_POST ['password'];
$email = $_POST ['email'];
$password_repeat = $_POST ['password_repeat'];
if($password_repeat != $password ){
    $_SESSION = $_POST;
    $_SESSION['error'] = "Пароли не совпадают";
    header('location: ../registr.php');
    exit;
}
$sql = "INSERT INTO users (fio, login, password, email) VALUES ('$fio', '$login', '$password', '$email')";
$result = $mysqli->query($sql);
$id = $mysqli->insert_id;
$_SESSION['login'] = $login;
$_SESSION['id_user'] = $id;
header('location: ../lk.php');
?>