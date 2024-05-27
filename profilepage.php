<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
   <?php require_once("header.php")?>
   <?php session_start() ?>
   <?php require_once('connect.php');?>
   <div class="container">
        <div class="contain-column">
            <div class="left-column">
                <div class="profile-btn-contain">
                    <a href="#" class="active-btn-profile" id="profile-btn" >Профиль</a>
                </div>
                <div class="profile-btn-contain">
                <a href="#" class="active-btn-profile" id="personal-data">Личные данные</a>
                </div>
                <div class="profile-btn-contain">
                <a href="orderspage.php" class="active-btn-profile" id="">Заказы</a>
                </div>
                <div class="profile-btn-contain">
                <a href="bookmarks.php" class="active-btn-profile" id="bookmarks">Закладки</a>
                </div>
                <div class="profile-btn-contain">
                <a href="exit.php" class="active-btn-profile">Выход</a>
                </div>
            </div>
            <div class="right-column">
            <?php if(isset($_SESSION['user']['id'])){
                 echo'<div class="profile-info-container">
                 <div class="profile-info" id="profile-info-1">
                     <div class="profile-title">
                         <h2>ПРОФИЛЬ</h2>
                     </div>
                     <div class="personal-data">
                         <a href="">Персональные данные</a>
                         <div class="data-from-bd">
                             <h3> '. $_SESSION['user']['surname'].' '. $_SESSION['user']['name'] .' </h3>
                             <p>+'.$_SESSION['user']['number'] .' · '.$_SESSION['user']['email'] .'</p>
                         </div>
                     </div>
                     <div class="personal-data">
                         <a href="">Заказы</a>
                         <div class="order-from-bd">
                             <h3>У вас пока нет заказов</h3>
                             
                         </div>
                     </div>
                     <div class="personal-data">
                         <a href="">Закладки</a>
                         <div class="bookmarks-from-bd">
                             <h3></h3>
                             
                         </div>
                     </div>
                 </div>
             </div>';

             echo'<div class="profile-info-container">
                 <div class="profile-info" id="perpe">
                     <div class="profile-title">
                         <h2>Личные данные</h2>
                     </div>
                     <div class="personal-data">
                         
                         <div class="data-from-bd">
                             <h3> '. $_SESSION['user']['surname'].' '. $_SESSION['user']['name'] .' </h3>
                             <p>+'.$_SESSION['user']['number'] .' · '.$_SESSION['user']['email'] .'</p>
                         </div>
                     </div>
                     
                 </div>
                 </div>';
                
              
} 
else{
     echo'<div class="register-profile">
                    <div class="register" id="register">
                        <h2>Регистрация</h2>
                        <form action="" class="form-register" method="POST">
                            <div class="group-input-form">
                                <input required="" type="text" class="input-form" name="name">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Имя</label>
                            </div>
                            <div class="group-input-form">
                                <input required="" type="text" class="input-form" name="surname">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Фамилия</label>
                            </div>
                            <div class="group-input-form">
                                <input required="" type="text" class="input-form" name="number" id="number" oninput="checkNumber()">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Телефон</label>
                                 <div class="status" id="number-status"></div>
                            </div>
                           
                            <div class="group-input-form">
                                <input required="" type="email" class="input-form" name="email" id="username" oninput="checkUsername()">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Почта</label>
                            </div>
                            <div class="status" id="username-status"></div>

                            
                            <div class="group-input-form">
                                <input required="" type="password" class="input-form" name="password">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Пароль</label>
                            </div>
                            <div class="error-block" id="error-block">

                            </div>
                            <button id="bottone5">Отправить</button>
                        </form>
                        
                        <h3>Или</h3>
                        <a href="#" class="login-link" id="loginBtn" onclick="login()">Войти</a>
                    </div>
                    <div class="login" id="login">
                    <h2>Вход</h2>
                    <form action="loginbd.php" method="POST">
                        <div class="group-input-form">
                            <input required="" type="text" class="input-form" name="number">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Телефон</label>
                        </div>
                        <div class="group-input-form">
                            <input required="" type="text" class="input-form" name="password">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Пароль</label>
                        </div>
                        <button id="bottone5">Отправить</button>
                    </form>
                    <h3>Или</h3>
                        <a href="#" class="login-link" id="registerBtn" onclick="registerBtn()">Регистрация</a>
                    </div>
                </div>';
}
?>
             
            </div>
        </div>  
   </div>
</body>
</html>
<script>


    function checkUsername() {
        var validEmail = '';
        let username = document.getElementById('username').value;
        $.ajax({
            type: 'POST',
            url: 'check_unique.php',
            data: { username: username },
            success: function(response) {
                if(response === 'unique' ) {
                    document.getElementById('username-status').innerHTML = '<span style="color:green;">Отлично!</span>';
                    document.querySelector("#username").classList.remove('error'); 
                    
                } 
                else if(response === 'not_mail'){
                    document.getElementById('username-status').innerHTML = '<span style="color:red;">Ошибка</span>';
                    document.querySelector("#username").classList.add('error');
                   
                  
                }
                else {
                    document.getElementById('username-status').innerHTML = '<span style="color:red;">Почта уже используется!</span>';
                    document.querySelector("#username").classList.add('error');
                  
                }
            }
        });
    }
    function checkNumber() {
        let number = document.getElementById('number').value;
        $.ajax({
            type: 'POST',
            url: 'check_number.php',
            data: { number: number },
            success: function(response) {
                if(response === 'unique' ) {
                    document.getElementById('number-status').innerHTML = '<span style="color:green;">Отлично!</span>';
                    document.querySelector("#number").classList.remove('error'); 
                    
                } 
                else if(response === 'not_mail'){
                    document.getElementById('number-status').innerHTML = '<span style="color:red;">Ошибка</span>';
                    document.querySelector("#number").classList.add('error'); 
                   
                  
                }
                else {
                    document.getElementById('number-status').innerHTML = '<span style="color:red;">Телефон уже используется!</span>';
                    document.querySelector("#number").classList.add('error'); 
                  
                }
            }
        });
    }
    function hasError() {
  return numberInput.classList.contains('error') || emailInput.classList.contains('error');
}

// Обработчик события submit формы
const form = document.querySelector('form'); 
form.addEventListener('submit', function(event) {
    const errorFields = document.querySelectorAll('.input-form.error'); 
  if (errorFields.length > 0) {
    event.preventDefault(); // Предотвращаем отправку формы
    document.getElementById('error-block').innerHTML = '<span style="color:red;">Неверно заполнены поля!</span>';
  } else{
    var formData = new FormData(document.querySelector('.form-register'));
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'signbd.php', true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
               
                console.log("Отправлено");
                location.reload();
            } else {
                console.log("Ошибка");
            }
        };
        xhr.send(formData);
    }
  });
</script>
<script src="js/profilepage.js"></script>
