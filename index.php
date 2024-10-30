<?php
if(isset($_COOKIE['user_is_opened']) == 1) {
    $connect = new mysqli("localhost", "root", "", "database1");
    $token = $_COOKIE['user_token'];
    $result = $connect->query("SELECT * FROM `users` WHERE `token` = '$token'");
    $result = mysqli_fetch_assoc($result);
    $count_view = $result['count_view'] + 1;
    print($count_view);
    setcookie("count_view", $count_view, time()+864000);
    if(!$_COOKIE['count_view']) {
        echo "<script>window.location.reload()</script>";
        setcookie("count_view", $count_view, time()+864000);
    }
    $connect->query("UPDATE `users` SET `count_view`='$count_view' WHERE `token` = '$token'");
} else if(isset($_COOKIE['user_is_opened']) ==0) {
    $connect = mysqli_connect("localhost", "root", "", "database1");
    $token = bin2hex(random_bytes(10));
    $count_view = 1;
    setcookie("count_view", $count_view, time()+864000);
    setcookie("user_is_opened", "true", time()+864000);
    setcookie("user_token", $token, time()+864000);
    $result = mysqli_query($connect, "INSERT INTO `users`(`token`)VALUES('$token');");
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./main.css">
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
</html>
