<?php session_start(); 
include './image_upload.php';
 include "../template/database.php";
 if (isset($_SESSION['role']) && $_SESSION['role'] != 2) { 
 header('location: ../login.php');
 exit;
}

$id_application = $_POST['id_application'];
$status = $_POST['status'];
$id_category = $_POST['id_category'];
if(empty($id_application) || empty($status) || empty($id_category)){
    $_SESSION['error'] = 'Проверьте данные';
    header('location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

$cancellation_reason = '';
$after_file_application = '';
if($status == 2){
    if(!empty($_FILES['after_photo_application']) && $_FILES['after_photo_application']['size'] > 0)
        $after_file_application = image_upload($_FILES['after_photo_application']);
    else {
        $_SESSION['error'] = 'Выберите файл';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}

if($status == 3){
    if(!empty($_POST['cancellation_reason'])){
        $cancellation_reason = $_POST['cancellation_reason'];
    } else {
        $_SESSION['error'] = 'Укажите причину отказа';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}


$sql ="UPDATE applications  SET 
id_category = '$id_category', 
status = '$status',
after_file_application = '$after_file_application',
cancellation_reason = '$cancellation_reason'
 WHERE id_application = $id_application";
$result = $mysqli->query($sql);
header('location: ../admin.php');