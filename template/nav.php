<div class="container mb-5">
            <div class="row">
                <div >                
                    <nav class="navbar navbar-expand-lg navbar-dark  text-white bg-dark">
                    <div class="container-fluid">
                    <div class="col-2">
                    </div>
                        <a class="navbar-brand" href="#"></a>
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        <?php if (empty($_SESSION['role'])) { ?>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Главная</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./login.php">Вход</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./registr.php">Регистрация</a>
                            </li>
                            <?php }?>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                                <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./lk.php">Личный кабинет</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./app.php">Подать заявку</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./logout.php">Выход</a>
                            </li>

                            <?php }?>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
                                <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./admin.php">Личный кабинет</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./logout.php">Выход</a>
                            </li>

                            <?php }?>
                        </ul>
                        </div>
                     </div>
                    </nav>
                </div>
            </div>
        </div>