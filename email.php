<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<b>
<?php
$id_book = $_GET['id'];
$fio = htmlspecialchars($_POST['fio']);
$fio = urldecode($_POST['fio']);
$fio = trim($_POST['fio']);
$adr = htmlspecialchars($_POST['adr']);
$adr = urldecode($_POST['adr']);
$adr = trim($_POST['adr']);
$count = htmlspecialchars($_POST['count']);
$count = urldecode($_POST['count']);
$count = trim($_POST['count']);
$link = new mysqli("localhost", "root", "", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
$res = $link->query('select * from genre, author, book where genre.id_genre=book.id_genre and author.id_author=book.id_author having id_book=' . $id_book . '');
$row = $res->fetch_assoc();
$row = 'Жанр: ' . $row['name_genre'] . '; Автор: ' . $row['name_author'] . '; Название книги: ' . $row['name_book'] . '.';
if (mail("mukataev@gmail.com", "Заказ книги", "ФИО: ' . $fio . '; Адрес: ' . $adr . '; ' . $row . 'Количество экземпляров: ' . $count . '", 'test'))
 {     echo "сообщение успешно отправлено"; 
} else { 
    echo "при отправке сообщения возникли ошибки";
}
?>
</b>
</body>
</html>
