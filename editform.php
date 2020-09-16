<?php
require_once 'connect.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$stmt = $pdo->prepare('SELECT * FROM books WHERE id=:id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php echo $book['title']?></h1>
    <img src="<?php echo $book['cover_path']?>">
    <script src="assets/app.js"></script>

<table>
<tr>
<td>Pealkiri:</td>
<td><input class="text" value=<?php echo $book['title']?>></td>
</tr>
<tr>
<td>Kirjeldus:</td>
<td><input type="text" value=<?php echo $book['summary']?>></td>
</tr>
<tr>
<td>Aasta:</td>
<td><input class="text" value=<?php echo $book['release_date']?>></td>
</tr>
<tr>
<td>Hind:</td>
<td><input type="text" value=<?php echo $book['price']?>></td>
</tr>
<tr>
<td>Lehekülgi:</td>
<td><input type="text" value=<?php echo $book['pages']?>></td>
</tr>
<tr>
<td>Laos:</td>
<td><input type="text" value=<?php echo $book['stock_saldo']?>></td>
</tr>
<tr>
<td>Tüüp:</td>
<td><input type="text" value=<?php echo $book['type']?>></td>
</tr>
</table>
<span>
<a href="book.php?id=<?php echo $book['id'];?>">Uuenda</a>
</span>
</body>
</html>
