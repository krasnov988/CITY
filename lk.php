<?php session_start(); ?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] != 1) { 
 header('location: ../login.php');
 exit;
}
?>
<?php include './template/database.php'?>;
<?php 
$id_user = $_SESSION['id_user'];
$sql ="SELECT * FROM applications WHERE id_user = $id_user";
    $result = $mysqli->query($sql);
$applications = $result->fetch_all(MYSQLI_ASSOC);
?>
<?php include "./template/header.php"?>
<header>
<?php include './template/nav.php';?>
</header> 
<div class="container">
<h1>«Сделаем лучше вместе!»</h1>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Изображения</th>
      <th scope="col">Имя</th>
      <th scope="col">Обращение</th>
      <th scope="col">Дата</th>
      <th scope="col">Статус</th>
      <th scope="col">Фото<br>ПОСЛЕ</th>
      <th scope="col">Причина<br>отказа</th>
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
      <td><img src="/img/<?= $application['after_file_application']?>" width="120" alt=""></td>
      <td><?= $application['cancellation_reason']?></td>
      <td>
        <?php if($application['status'] == 1){ ?>
        <a href="./scripts/delete_app.php?id_application=<?= $application['id_application']?>">Удалить</a>
        <?php } ?>
      </td>
    </tr>
    </tbody>
    <?php } ?>
    </table>

<?php include "./template/footer.php"?>