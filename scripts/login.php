<?php include '../template/database.php';


session_start();
if(empty($_POST['login']) || empty($_POST['password'])){
    $_SESSION = $_POST;
    $_SESSION['error'] = "Ведите логин или пароль";
    header('location: ../login.php');
    exit;
}   
$login = $_POST['login'];
$password = $_POST['password'];
$sql= "SELECT * FROM users WHERE login='$login' AND password='$password' limit 1;";
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
if($user){ 
    $_SESSION['login'] = $user['login'];
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['role'] = $user['role'];
    if($user['role'] == 1)
        header('location: ../lk.php');
    else 
        header('location: ../admin.php');
} else {
    $_SESSION = $_POST;
    $_SESSION['error'] = "Неверный логин или пароль";
    header('location: ../login.php');
    exit;
}
?>