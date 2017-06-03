<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<header><h1 align="center">Библиотека</h1></header>
<?php
$id_book = $_GET['id'];
$link = new mysqli("localhost", "root", "111", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
$res = $link->query('select * from genre, author, book where genre.id_genre=book.id_genre and author.id_author=book.id_author having book.id_book=' . $id_book . '');
$row = $res->fetch_assoc();
echo '<form action="/book/admin/edit.php?id=' . $id_book . '" method="post">
   <p>Жанр:&nbsp;<input name="name_genre" type="text" value="' . $row['name_genre'] . ' "required></p>
   <p>Автор:&nbsp;<input name="name_author" type="text" value="' . $row['name_author'] . ' "required></p>
   <p>Название:&nbsp;<input name="name_book" type="text" value="' . $row['name_book'] . ' " required></p>
   <p>Описание:&nbsp;<input name="description" type="text" value="' . $row['description'] . ' " required></p>
   <p>Цена:&nbsp;<input name="price" type="text" value="' . $row['price'] . ' " required></p>
   <p><input type="submit"></p></form>'
?>
</body>
</html>