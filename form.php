<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<header><h1 align="center" style="background: silver">Библиотека</h1>
<?php
echo '<p align="center"><b><a href="/book/">На главную</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/book/admin/">Админка</a></b></p>';
?>
</header>
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