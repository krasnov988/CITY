<?php session_start(); ?>
<?php include "./template/header.php"?>
<header>
    <?php include './template/nav.php';?>
    </header> 
    <main>
        <div class="container mb-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                    <form id="regForm" action="./scripts/reg.php" method="POST">
                    <?php if(isset($_SESSION['error'])){ ?>
                     <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']?>
                    </div>
                        <?php }  ?>
                   
                   ФИО:<input id="fio" type="text" name="fio" class="form-control" required value="<?= $_SESSION['fio'] ?? '' ?>"><br>
                   Email:<input id="email" type="text" name="email" class="form-control" required value="<?= $_SESSION['email'] ?? '' ?>"><br>
                   Логин:<input id="login" type="text" name="login" class="form-control" required value="<?= $_SESSION['login'] ?? '' ?>"><br>
                   Пароль:<input id="password" type="password" name="password" class="form-control" required value="<?= $_SESSION['password'] ?? '' ?>"><br>
                   Повторите пароль:<input id="password_repeat"  type="password" class="form-control" name="password_repeat" required value="<?= $_SESSION['password_repeat'] ?? '' ?>"><br>
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terms_accept" value="" id="terms_accept"  required>
                    <label class="form-check-label" for="terms_accept">
                      Согласие на обработку персональных данных 
                    </label>
                    </div>
                   <input type="submit" class="btn btn-primary"  value="Войти">
                </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </main>
       <?php include './template/footer.php';?>
<?php 
unset($_SESSION['error']); 
unset($_SESSION['fio']); 
unset($_SESSION['email']); 
unset($_SESSION['login']); 
unset($_SESSION['password']); 
unset($_SESSION['password_repeat']); 

?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("regForm");

    // Функция для удаления старых ошибок (и красной рамки)
    function clearError(field) {
      field.classList.remove("is-invalid");
      // Ищем все элементы с классом .error-message внутри "родительского" блока
      // и удаляем их (это наши сообщения об ошибке)
      const errorMessages = field.parentElement.querySelectorAll(".error-message");
      errorMessages.forEach(err => err.remove());
    }

    // Функция, которая добавляет сообщение об ошибке над полем и красную рамку
    function setError(field, message) {
      field.classList.add("is-invalid");
      const errorDiv = document.createElement("div");
      errorDiv.classList.add("text-danger", "error-message");
      errorDiv.innerText = message;
      // Добавляем сообщение ПЕРЕД самим полем (чтобы было над ним)
      field.parentElement.insertBefore(errorDiv, field);
    }

    form.addEventListener("submit", function(event) {
      // Сначала убираем старые ошибки
      const fioField = document.getElementById("fio");
      const emailField = document.getElementById("email");
      const loginField = document.getElementById("login");
      const passwordField = document.getElementById("password");
      const passwordRepeatField = document.getElementById("password_repeat");
      const termsAcceptField = document.getElementById("terms_accept");

      [fioField, emailField, loginField, passwordField, passwordRepeatField].forEach(field => {
        clearError(field);
      });
      // Для чекбокса можно при желании тоже сбрасывать возможные стили

      let hasError = false;

      // Получаем значения
      const fio = fioField.value.trim();
      const email = emailField.value.trim();
      const login = loginField.value.trim();
      const password = passwordField.value;
      const passwordRepeat = passwordRepeatField.value;
      const termsAccept = termsAcceptField.checked;

      // 1. Проверка ФИО
      if (!fio) {
        setError(fioField, "Пожалуйста, введите ФИО.");
        hasError = true;
      }

      // 2. Проверка email на пустоту и грубое соответствие формату
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email) {
        setError(emailField, "Пожалуйста, введите Email.");
        hasError = true;
      } else if (!emailRegex.test(email)) {
        setError(emailField, "Некорректный формат Email.");
        hasError = true;
      }

      // 3. Проверка логина на пустоту
      if (!login) {
        setError(loginField, "Пожалуйста, введите логин.");
        hasError = true;
      }

      // 4. Проверка пароля и повтора
      if (!password) {
        setError(passwordField, "Пожалуйста, введите пароль.");
        hasError = true;
      }
      if (!passwordRepeat) {
        setError(passwordRepeatField, "Пожалуйста, повторите пароль.");
        hasError = true;
      }
      if (password && passwordRepeat && password !== passwordRepeat) {
        setError(passwordRepeatField, "Пароли не совпадают.");
        hasError = true;
      }

      // 5. Проверка чекбокса
      //    Если чекбокс не отмечен - обычно хватает атрибута required, но если хотим
      //    более кастомное сообщение, можно сделать так:
      if (!termsAccept) {
        // Для чекбокса можно вывести alert или отдельное сообщение.
        // Или выделить текст, если хочется.
        alert("Пожалуйста, дайте согласие на обработку персональных данных.");
        hasError = true;
      }

      // Если есть ошибки, останавливаем отправку
      if (hasError) {
        event.preventDefault();
      }
    });
  });
</script>