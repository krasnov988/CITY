<?php
session_start();
include "./template/header.php"?>
<header>
    <?php include './template/nav.php';?>
    </header> 
    <main>
        <div class="container mb-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                    <form action="./scripts/login.php" method="post">
                    <?php if(isset($_SESSION['error'])){ ?>
                     <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']?>
                    </div>
                        <?php }  ?>
                   Логин:<input type="text" class="form-control" name="login">
                   Пароль:<input type="password" class="form-control" name="password">
                   <input type="submit"  class="btn btn-primary" value="Войти">
                </form>
                </div>       
                <div class="col-4"></div>
            </div>
        </div>
        <?php include "./template/footer.php"?>
        <?php 
unset($_SESSION['error']); 
unset($_SESSION['login']); 
unset($_SESSION['password']); 


?>