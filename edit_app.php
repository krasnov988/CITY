<?php session_start(); 
 include "./template/database.php";
 if (isset($_SESSION['role']) && $_SESSION['role'] != 2) { 
 header('location: ../login.php');
 exit;
}

$id_application = $_GET['id_application'];
$sql ="SELECT * FROM applications WHERE id_application = $id_application";
$result = $mysqli->query($sql);
$application = $result->fetch_assoc();

$sql ="SELECT * FROM categories";
$result = $mysqli->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);
$statuses = ['Не выбрано', 'Новый', 'Решена', 'Отклонена' ];
?>
<?php include "./template/header.php"?>

<header>
<?php include './template/nav.php';?>
</header> 
<div class="container mb-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
<h1>Панель «Управления заявкой»</h1>
<form action="./scripts/edit_app.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_application" class="form-control" value="<?= $application['id_application'] ?>">
    <?php if(isset($_SESSION['error'])){ ?>
                     <div class="alert alert-danger mt-4" role="alert">
                    <?= $_SESSION['error']?>
                    </div>
                        <?php }  ?>
    <select class="form-select" name="status" id="">
        <?php foreach($statuses as $key => $status){ ?>
            <option 
                value="<?= $key ?>" 
                <?= $key == $application['status']?'selected':'' ?>
                >
                <?= $status ?>
            </option>
        <?php } ?>
    </select><br>

    <textarea name="cancellation_reason" class="form-control" id="" placeholder="Укажите причину отказа при отклонении заявки"></textarea>
    <br>
    <input type="file" class="form-control" name="after_photo_application" id="after">
    <label for="after">Прикрепите фото "ПОСЛЕ", если завершаете заявку</label>
    <br>
    <select class="form-select"  name="id_category" id="">
    <?php foreach($categories as $category){ ?>
            <option 
                value="<?= $category['id_category'] ?>" 
                <?= $category['id_category'] == $application['id_category']?'selected':'' ?>
                >
                <?= $category['name_category'] ?>
            </option>
        <?php } ?>
    </select><br>
    <input type="submit" class="btn btn-primary"  value="сохранить">
    <br>
</form>

<img src="./img/<?= $application['file_application'] ?>" width="500" alt="">
<h3>Заявка <?= $application['name_application'] ?></h3>
<h3>Текст <?= $application['text_application'] ?></h3>
<h3>Дата <?= $application['date_application'] ?></h3>
</div>       
                <div class="col-4"></div>
            </div>
        </div>
<?php include "./template/footer.php"?>

<?php 
unset($_SESSION['error']); 
?>