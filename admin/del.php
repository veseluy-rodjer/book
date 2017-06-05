<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<?php
$id_book = $_GET['id'];
$link = new mysqli("localhost", "root", "", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
if (!$link->query('delete from book where id_book="' . $id_book . '"')) {
        echo "Не удалось удалить строку: (" . $link->errno . ") " . $link->error;
}
else {
    echo 'Строка успешно удалена';
}
$link->close();
?>
</body>
</html>