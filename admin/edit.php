<!DOCTYPE html>
<html>
<head>
<title>PHP и HTML</title>
</head>
<body>
<?php
$id_book = $_GET['id'];
$name_genre = htmlspecialchars($_POST['name_genre']);
$name_genre = urldecode($_POST['name_genre']);
$name_genre = trim($_POST['name_genre']);
$name_author = htmlspecialchars($_POST['name_author']);
$name_author = urldecode($_POST['name_author']);
$name_author = trim($_POST['name_author']);
$name_book = htmlspecialchars($_POST['name_book']);
$name_book = urldecode($_POST['name_book']);
$name_book = trim($_POST['name_book']);
$description = htmlspecialchars($_POST['description']);
$description = urldecode($_POST['description']);
$description = trim($_POST['description']);
$price = htmlspecialchars($_POST['price']);
$price = urldecode($_POST['price']);
$price = trim($_POST['price']);
$link = new mysqli("localhost", "root", "", 'yes');
if ($link->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $link->connect_error;
}
$gen = 0;
$aut = 0;
$res = $link->query('select * from genre');
foreach ($res as $row ) {
    if ($name_genre == $row['name_genre']) {
        $gen += 1;
    }
}
$res = $link->query('select * from author');
foreach ($res as $row ) {
    if ($name_author == $row['name_author']) {
        $aut += 1;
    }
}
if ($gen == 0) {
    if (!$link->query('insert into genre (name_genre) values ("' . $name_genre . '")')) {
        echo "Не удалось внести в genre: (" . $link->errno . ") " . $link->error;
    }
}
if ($aut == 0) {
    if (!$link->query('insert into author (name_author) values ("' . $name_author . '")')) {
        echo "Не удалось внести в author: (" . $link->errno . ") " . $link->error;
    }
}
$res = $link->query('select * from genre where name_genre="' . $name_genre . '"');
$row = $res->fetch_assoc();
$id_genre = $row['id_genre'];
$res = $link->query('select * from author where name_author="' . $name_author . '"');
$row = $res->fetch_assoc();
$id_author = $row['id_author'];
if (!$link->query('update book set name_book="' . $name_book . '", description="' . $description . '", price="' . $price . '", id_genre="' . $id_genre . '", id_author="' . $id_author . '" where id_book="' . $id_book . '"')) {
    echo "Не удалось внести изменнения в book: (" . $link->errno . ") " . $link->error;
}
$res = $link->query('select * from genre, author, book where genre.id_genre=book.id_genre and author.id_author=book.id_author having id_book=' . $id_book . '');
$row = $res->fetch_assoc();
$row = '<br>Результат Ваших изменнеий: Жанр: ' . $row['name_genre'] . '; Автор: ' . $row['name_author'] . '; Название книги: ' . $row['name_book'] . '; Описание: ' . $row['description'] . '; Цена: ' . $row['price'] . '.';
echo $row;
$link->close();
?>
</body>
</html>