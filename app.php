<?php session_start(); ?>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] != 1) { 
 header('location: ../login.php');
 exit;
}
?>

    
    <?php include "./template/header.php"?>
<header>
<?php include './template/nav.php';?>
</header> 
<div class="container mb-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
<form action="./scripts/app.php" method="POST" enctype="multipart/form-data">
<?php if(isset($_SESSION['error'])){ ?>
                     <div class="alert alert-danger mt-4" role="alert">
                    <?= $_SESSION['error']?>
                    </div>
                        <?php }  ?>
Название заявки :<input type="text"  class="form-control"name="name_application" required ><br>
Текст заявки:<input type="text" class="form-control" name="text_application" required ><br>

<div class="input-group mb-3">
  <input type="file" name="file_application" class="form-control" id="inputGroupFile01">
</div>
<input type="submit"   class="btn btn-primary" value="Отправить">
</form>
</div>       
                <div class="col-4"></div>
            </div>
        </div>

<?php 
unset($_SESSION['error']); 
?>