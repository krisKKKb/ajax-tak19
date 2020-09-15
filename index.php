<?php

 $host = 'd83304.mysql.zonevs.eu';
 $db   = 'd83304_books';
 $user  = 'd83304sa325722';
 $pass = '';
 $charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->prepare('SELECT * FROM books');
$stmt->execute();
$aBooks = $stmt->fetchAll();

var_dump($books);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
<?php     foreach ($aBooks as $book) { ?>
        <li>
            <a href="book.php?id="> . <?php echo $book[id] . </a> . ?>"
            <?php echo $book['title'];
            ?>
        </li>
    }
    </ul>
    <script src="assets/app.js"></script>
</body>
</html>
