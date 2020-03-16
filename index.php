<?php 
$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Welkom op het netland beheerderpaneel</h1>
    <h2>Series</h2>
    <table>
        <tr>
            <th>Titel</th>
            <th>Rating</th>
        </tr>
        <?php
        $stmt = $pdo->query('SELECT * FROM series');
        while ($row = $stmt->fetch()) { 
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Films</h2>
    <table>
        <tr>
            <th>Titel</th>
            <th>Duur</th>
        </tr>
        <?php
        $stmt = $pdo->query('SELECT * FROM films');
        while ($row = $stmt->fetch()) { 
            echo "<tr>";
            echo "<td>" . $row['titel'] . "</td>";
            echo "<td>" . $row['duur'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>