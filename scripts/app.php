
<?php include '../template/database.php';
 include './image_upload.php';


session_start();
  
$name_application = $_POST['name_application'];
$text_application= $_POST['text_application'];
$id_user = $_SESSION['id_user'];
$date_application = date('Y-m-d H:i:s');
if(empty($name_application) || empty($text_application) || empty($date_application)){
    $_SESSION['error'] = 'Проверьте данные';
    header('location: ../app.php');
    exit;
}

if(!empty($_FILES['file_application']) && $_FILES['file_application']['size'] > 0){
    $file_application = image_upload($_FILES['file_application']);
} else {
    $_SESSION['error'] = 'Выберите файл';
    header('location: ../app.php');
    exit;
}
 
$sql = "INSERT INTO applications (name_application, text_application, id_user, file_application, date_application  ) VALUES ('$name_application', '$text_application', '$id_user', '$file_application','$date_application' )";
$mysqli->query($sql);

header('location: ../lk.php');

