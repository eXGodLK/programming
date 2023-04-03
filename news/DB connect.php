<?php
//подключение к БД
$servername = "localhost"; //это оставляете как есть
$username = "root"; //ваш логин от БД
$password = ""; //ваш пароль от БД
$dbname = "news"; // название вашей базы данных, где находится сама таблица с домами

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Если что-то введено неверно, то будет выведена ошибка
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}


//сам запрос к БД
$sql = "SELECT id, name, img, user, text FROM news12"; // сам запрос..
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='contmeleft'>
<img width='360px' src='". $row["img"]. "' >
<h>" . $row["name"]. "</h><p>". $row["text"] ."</p>
</div>";//вариант вывода. выведем картинку и название
    }
} else {
    echo "ничего нет"; // если в таблице ничего нет, то выведется это сообщение
}
?>
