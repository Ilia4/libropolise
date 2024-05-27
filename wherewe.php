<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/where.css">
</head>
<body>
<?php require_once("connect.php") ?>
    <?php require_once("header.php") ?>
    <?php session_start() ?>
    <div class="container">

        <div class="map">
            <h3>НАШ МАГАЗИН</h3>
            <div style="position:relative;overflow:hidden;"><iframe src="https://yandex.ru/map-widget/v1/?ll=45.185588%2C54.183823&mode=whatshere&whatshere%5Bpoint%5D=45.180079%2C54.182373&whatshere%5Bzoom%5D=16.33&z=16.33" width="900" height="600" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
        <div class="info-block">
            <div class="first-info">
                    <div class="b1">
                        <h3>Телефон:</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25"viewBox="0 0 19 19" svg="[object Object]" class="icon-call-svg"><path  d="M12.793 4.621 17.414 0l1.414 1.414-4.62 4.622L17 8.828h-7v-7zM1.114 2.464c.682-.682 2.737-.795 2.753-.435.015.36 1.851 4.36 1.868 4.72.015.361-1.212 1.59-1.57 1.95-.356.357 2.4 3.478 2.451 3.537.06.052 3.173 2.814 3.529 2.458.358-.36 1.585-1.59 1.944-1.574.36.016 4.35 1.857 4.71 1.872.36.017.246 2.076-.435 2.76-.58.582-3.593 2.698-8.83-1.081-.575-.331-1.485-1.091-2.864-2.473l-.002-.002-.003-.003-.004-.004-.003-.002c-1.378-1.383-2.136-2.295-2.466-2.87-3.77-5.25-1.659-8.27-1.078-8.853"></path></svg>
                        <p>+7 (898) 345-14-48</p>
                    </div>
                    <div class="b1">
                    <h3>Телефон горячей линии:</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25"viewBox="0 0 19 19" svg="[object Object]" class="icon-call-svg"><path d="M12.793 4.621 17.414 0l1.414 1.414-4.62 4.622L17 8.828h-7v-7zM1.114 2.464c.682-.682 2.737-.795 2.753-.435.015.36 1.851 4.36 1.868 4.72.015.361-1.212 1.59-1.57 1.95-.356.357 2.4 3.478 2.451 3.537.06.052 3.173 2.814 3.529 2.458.358-.36 1.585-1.59 1.944-1.574.36.016 4.35 1.857 4.71 1.872.36.017.246 2.076-.435 2.76-.58.582-3.593 2.698-8.83-1.081-.575-.331-1.485-1.091-2.864-2.473l-.002-.002-.003-.003-.004-.004-.003-.002c-1.378-1.383-2.136-2.295-2.466-2.87-3.77-5.25-1.659-8.27-1.078-8.853"></path></svg>
                    <p>13-37-48</p>
                </div>
                
            </div>
            <div class="first-info">
                <div class="b1">
                    <h3>Наша почта:</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="29"viewBox="0 0 24 24" class="IconSvg IconSvg_name_SvgChat IconSvg_size_24 OpenChatByOfferButton__icon OpenChatByOfferButton__icon_color_green"><path fill="currentColor" d="M12.506 1C6.711 1 2.013 5.694 2.013 11.485c0 1.909.519 3.693 1.41 5.235L2 22l5.943-1.084a10.45 10.45 0 0 0 4.563 1.054C18.302 21.97 23 17.276 23 11.485S18.302 1 12.506 1m0 2c4.685 0 8.495 3.806 8.495 8.485s-3.81 8.485-8.495 8.485a8.4 8.4 0 0 1-3.692-.855l-.587-.284-.641.117-2.833.517.6-2.225.217-.803-.417-.719a8.47 8.47 0 0 1-1.141-4.233C4.012 6.806 7.822 3 12.506 3M9 11.5a1.5 1.5 0 1 0-3.001.001A1.5 1.5 0 0 0 9 11.5m5 0a1.5 1.5 0 1 0-3.001.001A1.5 1.5 0 0 0 14 11.5m5 0a1.5 1.5 0 1 0-3.001.001A1.5 1.5 0 0 0 19 11.5"></path></svg>
                    <p>libropolis@gmail.com</p>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>