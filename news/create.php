<?php
if (isset($_POST["name"]) && isset($_POST["user"]) && isset($_POST["text"])&& isset($_POST["img"])) {
    $conn = new mysqli("localhost", "root", "", "news");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    $user = $conn->real_escape_string($_POST["user"]);
    $text = $conn->real_escape_string($_POST["text"]);
    $img = $conn->real_escape_string($_POST["img"]);
    $now = date(" H : i : s d - m - Y "); // дата будет выводиться в формате "время, дата"
    $sql = "INSERT INTO news12 (name, img, user, text, date ) VALUES ('$name', '$img', '$user', '$text', '$now')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
