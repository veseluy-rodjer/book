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
    <td>Описание</td>
    <td>Цена</td>
    <td>Заказать</td>
  </tr>

<?php
$id_book = $_GET['id'];
$link = new mysqli("localhost", "root", "", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
$res = $link->query('select * from book where id_book=' . $id_book . '');
$row = $res->fetch_assoc();
echo '<tr><th>' . $row['description'] . '</th><th>' . $row['price'] . '</th><th><a href="/book/form.php?id=' . $id_book . '"><p>Оформить заказ</p></a></th></tr>';
$link->close();
?>

</table>
</body>
</html>