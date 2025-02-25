<?php session_start(); ?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] != 2) { 
 header('location: ../login.php');
 exit;
}
?>
<?php include './template/database.php'?>;
<?php $sql ='SELECT * FROM applications';
    $result = $mysqli->query($sql);
$applications = $result->fetch_all(MYSQLI_ASSOC);
?>
<?php include "./template/header.php"?>
<header>
<?php include './template/nav.php';?>
</header> 
<div class="container">
<h1>«Сделаем лучше вместе!»</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Изображения</th>
      <th scope="col">Имя</th>
      <th scope="col">Обращение</th>
      <th scope="col">Дата</th>
      <th scope="col">Статус</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <?php 
  $statuses = ['', 'Новый', 'Решена', 'Отклонена' ];
  foreach ($applications as $application ) {?>
  <tbody>
    <tr>
      <td><?= $application['id_application']?></td>
      <td><img src="/img/<?= $application['file_application']?>" width="120" alt=""></td>
      <td><?= $application['name_application']?></td>
      <td><?= $application['text_application']?></td>
      <td><?= $application['date_application']?></td>
      <td><?= $statuses[$application['status']]?></td>
      <td> <a href="edit_app.php?id_application=<?= $application['id_application']?>">Управлять</a>
      <a href="./scripts/delete_app.php?id_application=<?= $application['id_application']?>">Удалить</a>
    </td>
    </tr>
    </tbody>
    <?php } ?>
    </table>


</div>
<?php include "./template/footer.php"?>