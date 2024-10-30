<?php

    if(isset($_COOKIE['is_opened'])) {
        $connect = new PDO("sqlite:main.db");
        $token = $_COOKIE['user_token'];
        $result = $connect->query("SELECT count_view FROM `users` WHERE `token` = '$token'");
        foreach($result as $row) {$data = $row;};
        $count_view = $data[0] + 1;
        $connect->query("UPDATE `users` SET count_view = '$count_view' WHERE `token` = '$token'");
        setcookie("view_count", $count_view, time()+864000);
    } else if(!isset($_COOKIE['is_opened'])) {
        $token = bin2hex(random_bytes(16));
        setcookie("user_token", $token, time()+864000);
        setcookie("is_opened", "true", time()+864000);
        setcookie("view_count", "0", time()+864000);
        $connect = new PDO("sqlite:main.db");
        $connect->query("INSERT INTO `users`(`token`)VALUES('$token')");
    }
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./main.css">
    <script src="https://cdn.jsdelivr.net/npm/@simondmc/popup-js@1.4.3/popup.min.js"></script>
    <link rel="stylesheet" href="./responsive.main.css">
</head>
<body>
    <div class="all">
        <div class="container">
            <div action="" class="form">
                <span>Tabiiy Yechimi</span>
                <p class="red-paragraph">O'zbekiston bo'ylab yetkazib berish</p><br>
                <label for="">Ismingiz:</label>
                <input type="text" id="name" name="name" placeholder="Ism"><br>
                <label for="">Telefon Raqam:</label>
                <input type="text" id="number" placeholder="Raqam" name="number"><br>
                <label for="">Yashash joyingiz</label>
                <select id="select-menu">  
                    <option value="Toshkent shahar">Toshkent shahar</option>
                    <option value="Farg'ona viloyati">Farg'ona viloyati</option>
                    <option value="Andijon viloyati">Andijon viloyati</option>
                    <option value="Namangan viloyati">Namangan viloyati</option>
                    <option value="Sirdaro viloyati">Sirdaro viloyati</option>
                    <option value="Toshkent viloyati">Toshkent viloyati</option>
                    <option value="Jizzax viloyati">Jizzax viloyati</option>
                    <option value="Navoiy viloyati">Navoiy viloyati</option>
                    <option value="Buxoro viloyati">Buxoro viloyati</option>
                    <option value="Xorazm viloyati">Xorazm viloyati</option>
                    <option value="Surxondaro viloyati">Surxondaro viloyati</option>
                    <option value="Qashqadaryo viloyati">Qashqadaryo viloyati</option>
                    <option value="Qoraqalpog'iston Respublikasi">Qoraqalpog'iston Respublikasi</option>
                </select>
                <button class="send_btn">Yuborish</button>
            </div>
        </div>
    </div>
    
</body>
<script src="./main.js"></script>
<script type="text/javascript">
</script>
</html>
