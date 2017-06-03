<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<header><h1 align="center">Библиотека</h1></header>
<?php
echo '<form action="/book/admin/ins.php" method="post">
   <p>Жанр:&nbsp;<input name="name_genre" type="text" required></p>
   <p>Автор:&nbsp;<input name="name_author" type="text" required></p>
   <p>Название:&nbsp;<input name="name_book" type="text" required></p>
   <p>Описание:&nbsp;<input name="description" type="text" required></p>
   <p>Цена:&nbsp;<input name="price" type="text" required></p>
   <p><input type="submit"></p></form>'
?>
</body>
</html>