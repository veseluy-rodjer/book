<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<header><h1 align="center">Библиотека</h1></header>
<?php
$id_book = $_GET['id'];
echo '<form action="/book/email.php?id=' . $id_book . '" method="post">
   <p>ФИО:&nbsp;<input name="fio" type="text" required></p>
   <p>Почтовый адрес:&nbsp;<input name="adr" type="text" required></p>
   <p>Количество зкземпляров:&nbsp;<input name="count" type="number" required></p>
   <p><input type="submit"></p></form>'
?>
</body>
</html>