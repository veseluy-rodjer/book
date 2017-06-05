<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
<style>
   table {
    width: 100%; /* Ширина таблицы */
    background: white; /* Цвет фона таблицы */
    color: black; /* Цвет текста */
    border-spacing: 1px; /* Расстояние между ячейками */
   }
   td {
    background: LightSkyBlue; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
   }
   th {
    background: white; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг текста */
   }
</style>
</head>
<body>
<header><h1 align="center" style="background: silver">Библиотека</h1>
<?php
echo '<p align="center"><b><a href="/book/">На главную</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/book/admin/">Админка</a></b></p>';
?>
</header>
<table>
  <tr>
    <td>Жанр</td>
    <td>Автор</td>
    <td>Название</td>
    <td>Цена</td>
  </tr>

<?php
$link = new mysqli("localhost", "root", "", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
if ($id_genre = $_GET['id_genre']) {
  $res = $link->query('select * from genre, author, book where genre.id_genre=book.id_genre and author.id_author=book.id_author having genre.id_genre=' . $id_genre . '');
  for ($row_no = 0; $row_no <= $res->num_rows - 1; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    $id_book = $row['id_book'];
    echo '<tr><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['name_genre'] . '</a></th><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['name_author'] . '</a></th><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['name_book'] . '</a></th><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['price'] . '</a></th></tr>';
  }
}
if ($id_author = $_GET['id_author']) {
  $res = $link->query('select * from genre, author, book where genre.id_genre=book.id_genre and author.id_author=book.id_author having author.id_author=' . $id_author . '');
  for ($row_no = 0; $row_no <= $res->num_rows - 1; $row_no++) {
    $res->data_seek($row_no);
    $row = $res->fetch_assoc();
    $id_book = $row['id_book'];
    echo '<tr><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['name_genre'] . '</a></th><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['name_author'] . '</a></th><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['name_book'] . '</a></th><th><a href="/book/description_book.php?id=' . $id_book . '">' . $row['price'] . '</a></th></tr>';
  }
}
?>

</table>
</body>
</html>