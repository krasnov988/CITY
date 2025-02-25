<?php


function image_upload($file){
        // 2. Настройка параметров
    $target_dir = "../img/";  // Папка для сохранения изображений (относительно текущего скрипта)
    $file_application = time() . '.'. pathinfo($file["name"], PATHINFO_EXTENSION);
    $file_path = $target_dir .$file_application;  // Полный путь к файлу
    $uploadOk = 1; // Флаг, указывающий, разрешена ли загрузка (1 - да, 0 - нет)
    $imageFileType = strtolower(pathinfo($file_application, PATHINFO_EXTENSION)); // Расширение файла
    $maxFileSize = 20000000; // Максимальный размер файла в байтах (20MB)
    $allowedFileTypes = array("jpg", "jpeg", "png","bmp", "gif"); // Разрешенные расширения файлов

    // 3. Проверки

    // 3.1. Проверка, является ли файл изображением
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
    $uploadOk = 1;
    } else {
        $_SESSION['error'] = 'Файл не является изображением.';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
        $uploadOk = 0;
    }

    // 3.3. Проверка размера файла
    if ($file["size"] > $maxFileSize) {
        $_SESSION['error'] = 'К сожалению, ваш файл слишком большой';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
        $uploadOk = 0;
    }

    // 3.4. Проверка разрешенных расширений файлов
    if (!in_array($imageFileType, $allowedFileTypes)) {
        $_SESSION['error'] = 'К сожалению, разрешены только файлы JPG, JPEG, PNG и GIF.';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
        $uploadOk = 0;
    }

    // 4. Загрузка файла

    // 4.1. Проверка значения $uploadOk.  Если $uploadOk равен 0, выводится сообщение об ошибке.
    if ($uploadOk == 0) {
        $_SESSION['error'] = 'К сожалению, ваш файл не был загружен.';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
    // Если все проверки пройдены успешно, попытайтесь загрузить файл
    } else {
    if (move_uploaded_file($file["tmp_name"],$file_path)) {
        echo "Файл " . htmlspecialchars(basename($file["name"])) . " был успешно загружен.<br>";
    } else {
        $_SESSION['error'] = 'К сожалению, произошла ошибка при загрузке вашего файла.';
        header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
    }

    return $file_application;
}