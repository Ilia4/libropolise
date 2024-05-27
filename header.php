<link rel="stylesheet" href="css/header.css">

<?php session_start() ?>
<div class="header">
    <div class="useful-links">
        <a href="about_company.php" class="link">О компании</a>
        <a href="wherewe.php" class="link">Где мы находимся</a>
    </div>
    <div class="main-buttons">

      <div class="logo" id="logo">
        <img src="css/logo.png" alt="" srcset="" width="150">    
      </div> 

      <div class="button-search">
        <button class="custom-btn btn-2" id="catalog">Каталог</button>
      </div>
      <div class="input-container">
        <input type="text" name="text" class="input" placeholder="search...">
      </div>
      <div class="profile-buttons">

        <div class="profile">
          <button class="header-profile-button" id="profile">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="header-profile"><path d="M14.29 9.329a4.614 4.614 0 012.582-.246 4.54 4.54 0 012.298 1.188 4.348 4.348 0 011.242 2.25 4.275 4.275 0 01-.26 2.549 4.409 4.409 0 01-1.665 1.963 4.588 4.588 0 01-2.487.73h-.001a4.567 4.567 0 01-3.168-1.272 4.329 4.329 0 01-1.331-3.108v-.001c0-.875.269-1.727.767-2.448A4.476 4.476 0 0114.29 9.33zm2.204 1.718c-.492-.095-1-.046-1.462.139-.46.184-.849.494-1.12.886a2.3 2.3 0 00-.412 1.31c0 .62.256 1.221.721 1.67.466.451 1.106.71 1.78.711.501 0 .99-.144 1.401-.41.412-.266.728-.64.912-1.071a2.28 2.28 0 00.14-1.358 2.349 2.349 0 00-.674-1.214 2.54 2.54 0 00-1.286-.663z"></path><path d="M30 16c0 7.732-6.268 14-14 14S2 23.732 2 16 8.268 2 16 2s14 6.268 14 14zm-8 10.395v-1.122a3.616 3.616 0 00-1.748-3.096 8.232 8.232 0 00-8.504 0A3.616 3.616 0 0010 25.273v1.122A11.945 11.945 0 0016 28c2.186 0 4.235-.584 6-1.605zm1.99-1.442A11.97 11.97 0 0028 16c0-6.627-5.373-12-12-12S4 9.373 4 16a11.97 11.97 0 004.01 8.953 5.616 5.616 0 012.705-4.489 10.232 10.232 0 0110.57 0 5.616 5.616 0 012.706 4.489z"></path></svg>
          </button>
          <?php
          if(isset($_SESSION['user']['id'])){


            echo'<span class="header-profile-span">'.$_SESSION['user']['name'].'</span>';
          }
          else{

           
            echo '<span class="header-profile-span">Профиль</span>';
          }
          ?>
         
        </div>

        <div class="order">
          <button class="header-order-button" id="headerBtnOrder">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="header-orders"><path d="M17.392 2.703a2.925 2.925 0 00-2.786 0L3.56 8.687a.925.925 0 00-.485.813v11.809c0 1.073.588 2.06 1.532 2.572l10.953 5.932a.925.925 0 00.88 0l10.953-5.932a2.925 2.925 0 001.532-2.572V9.5a.925.925 0 00-.484-.813L17.392 2.703zm-1.905 1.626c.32-.173.705-.173 1.024 0l9.53 5.162-4.04 2.14L11.95 6.247l3.538-1.917zm-9.53 5.162l4.045-2.19 10.03 5.375L16 14.813 5.958 9.491zM4.925 21.31V11.037l10.15 5.38v11.03l-9.587-5.193a1.075 1.075 0 01-.563-.945zm12 6.138v-11.03l10.15-5.38V21.31c0 .394-.216.757-.563.945l-9.587 5.193z"></path></svg>
            
          </button>
          <span class="header-order-span">Заказы</span>
        </div>

        <div class="wishlist">
          <button class="header-wishlist-button" id="headerBtnBookmarks">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="header-wishlist"><path d="M8 5a1 1 0 00-1 1v20.382l8.553-4.276a1 1 0 01.894 0L25 26.382V6a1 1 0 00-1-1H8zM5 6a3 3 0 013-3h16a3 3 0 013 3v22a1 1 0 01-1.447.894L16 24.118l-9.553 4.776A1 1 0 015 28V6z"></path></svg>
          </button>
          <span class="header-wishlist-span">Закладки</span>
        </div>

        <div class="basket">
          <button class="header-basket-button" id="headerBtnBasket">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="header-basket"><path d="M3 1.999a1 1 0 000 2h2v19a1 1 0 001.053.998l17.523-.922a3 3 0 002.753-2.268L29.97 6.241A1 1 0 0029 5H7V3a1 1 0 00-1-1H3zm4 12v-7h20.72l-1.75 7H7zm0 2h18.47l-1.081 4.323a1 1 0 01-.918.756L7 21.945v-5.946zm2 12a2 2 0 11-4 0 2 2 0 014 0zm10 2a2 2 0 100-4 2 2 0 000 4z"></path></svg>
          </button>
          <span class="header-basket-span">Корзина</span>
        </div>
      </div>
      
    </div>

    <div class="useful-buttons">
        <a href="allbooks.php" class="useful-buttons-links">Распродажа</a>
        <a href="allbooks.php" class="useful-buttons-links">МАНГА</a>
        <a href="allbooks.php" class="useful-buttons-links">Что еще почитать?</a>
        <a href="allbooks.php" class="useful-buttons-links">Последние новинки</a> 
    </div>
</div>
<script src="js/header.js"></script>