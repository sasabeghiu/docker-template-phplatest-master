<?php
require_once("dbconfig.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<html>

<head>
    <title>Guestbook CMS</title>
    <link rel="stylesheet" href="#.css">
</head>

<body>
    <h1>Welcome to Guestbook Management Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Posted at</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>IP Address</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM posts");
        foreach ($result as $row) {
            echo ("<tr><td>" . $row['id'] . "</td>");
            echo ("<td>" . $row['posted_at'] . "</td>");
            echo ("<td>" . $row['name'] . "</td>");
            echo ("<td>" . $row['email'] . "</td>");
            echo ("<td>" . $row['message'] . "</td>");
            echo ("<td>" . $row['ip_address'] . "</td>");
            echo ("<td>
                <form action='delete.php?id=" . $row['id'] . "' method='POST'>
                <input type='hidden' name='name' value='" . $row['id'] . "'>
                <input type='submit' name='submit' value='Delete'>
                </form></td>");
            echo ("<td>
                <form action='update.php?id=" . $row['id'] . "' method='POST'>
                <input type='hidden' name='name' value='" . $row['id'] . "'>
                <input type='submit' name='submit' value='Update'>
                </form></td></tr>");
        }
        ?>
    </table>
</body>

</html>