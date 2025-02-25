<?php 
include '../template/database.php';
session_start();
 if (empty($_SESSION['id_user'])) { 
    header('location: ../login.php');
    exit;
}
$id_application = $_GET['id_application'];
$sql = "DELETE FROM applications WHERE id_application = $id_application ";
$result = $mysqli->query($sql);
header('location: '.$_SERVER['HTTP_REFERER']);

?>

