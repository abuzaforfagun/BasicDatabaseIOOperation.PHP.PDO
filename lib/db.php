<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=u1650413;host=localhost';
$user = 'u1650413';
$password = '08jan98';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>