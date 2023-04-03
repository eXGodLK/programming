<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<?php
$server="localhost";
$user="root";
$pass="";
$DB="news";
$conn = mysqli_connect($server, $user, $pass, $DB);
// Если что-то введено неверно, то будет выведена ошибка
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql= "SELECT text, title, date, user FROM news12 ORDER BY news_id DESC LIMIT 15";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td bgcolor=#FFFFFF>" . $row['title'] . "   Дата " . $row['date'] . "   Aiaaaee " . $row['user'] . "</td></tr>";
        echo "<tr><td bgcolor=#FFFFFF>" . $row['text'] . "</td></tr>";
        echo "<tr><td bgcolor=#F4F4F4> </td></tr></table><br>";
    }
}
else {
    echo "ничего нет"; // если в таблице ничего нет, то выведется это сообщение
}
?>