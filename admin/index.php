<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<header><h1 align="center" style="background: silver">Библиотека</h1>
<?php
echo '<p align="center"><b><a href="/book/"a>На главную</a></b></p>';
?>
</header>
<?php
$link = new mysqli("localhost", "root", "", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
echo '<h2>Жанры: </h2><br>';
$res = $link->query('SELECT * FROM genre');
for ($row_no = 0; $row_no <= $res->num_rows - 1; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    $id_genre = $row['id_genre'];
    echo '<b><a href="/book/admin/list_book.php?id_genre=' . $id_genre . '">' . $row['name_genre'] . '</a></b>;&nbsp;&nbsp;&nbsp;';
}
echo '<h2>Авторы: </h2><br>';
$res = $link->query('SELECT * FROM author');
for ($row_no = 0; $row_no <= $res->num_rows - 1; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    $id_author = $row['id_author'];
    echo '<b><a href="/book/admin/list_book.php?id_author=' . $id_author . '">' . $row['name_author'] . '</a></b>;&nbsp;&nbsp;&nbsp;';
}
$link->close();
?>
</table>
</body>
</html>