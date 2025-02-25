<?php include "./template/header.php"?>
<?php include "./template/database.php";
$sql = 'SELECT * FROM applications, categories WHERE categories.id_category = applications.id_category
AND status = 2 limit 4';
$result = $mysqli->query($sql);
$applications = $result->fetch_all(MYSQLI_ASSOC);

?>
<header>
<?php include './template/nav.php';?>
</header> 
<div class="container">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <h1 class="display-4" id="counter">100001</h1>
      <p class="lead">Количество решенных заявок.</p>
  </div>
</div>
<h1>«Сделаем лучше вместе!»</h1>
<h3>Добро пожаловать на городской портал «Сделаем лучше вместе!»

Наш портал – это удобная и безопасная платформа для жителей города, созданная для оперативного и эффективного решения проблем городской инфраструктуры. Здесь каждый может оставить заявку на ремонт дорог, детских площадок, зданий и других объектов, требующих внимания.

Что мы предлагаем:
<ul>
    <li>Простота и доступность: Интуитивно понятный интерфейс позволяет быстро зарегистрироваться, найти нужную категорию проблемы и оставить заявку, описав её с помощью текста и фотографий.
</li>
    <li>Прозрачность работы: Вы всегда можете отслеживать статус своей заявки, узнавать о проведенных работах и оставлять отзывы о качестве выполненных ремонтных работ.
</li>
    <li>Безопасность: Наш портал разработан с использованием современных технологий защиты. Все данные надежно шифруются, а система разграничения доступа предотвращает несанкционированное вмешательство в административные функции.
</li>
    <li>Интеграция с городскими службами: Ваши заявки поступают напрямую в соответствующие муниципальные службы, что обеспечивает оперативное реагирование и выполнение работ.
</li>
    <li>Участие каждого: Мы уверены, что только совместными усилиями можно сделать город лучше. Присоединяйтесь к инициативе «Сделаем лучше вместе!» и вносите свой вклад в создание комфортной городской среды.
</li>
</ul>

Начните с простого – оставьте заявку, и мы вместе сделаем наш город лучше и безопаснее для всех!.</h3>
<h2>Последние решенные заявления граждан:</h2>
<div class="row">
    <?php 
    foreach($applications as $application){ ?>
        <div class="card m-2" style="width: 18rem;">
            <div class="card-img-wrapper card-img-top">
                <img src="img/<?= $application['file_application'] ?>" alt="before">
                <img src="img/<?= $application['after_file_application']??$application['file_application'] ?>" alt="after">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $application['name_application'] ?></h5>
                <p class="card-text"><?= $application['name_category'] ?></p>
                <i><?= $application['date_application'] ?></i>
            </div>
        </div>
    <?php } ?>
</div>
</div>
<script>
    function updateCounter() {
    fetch('/scripts/count_solved.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('counter').innerHTML = data;
        })
        .catch(error => console.error('Error fetching counter:', error));
    }

    setInterval(updateCounter, 5000);

    updateCounter();
</script>

<?php include "./template/footer.php"?>