<?php
require_once("dbconfig.php");

//redirect to login page if user not logged in
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login.php");
}
//disply logged username
echo "User <b>" .  $_SESSION['user'] . "</b> Logged in successfully! ";
echo "<a href='logout.php'> Logout</a> ";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST["delete"])) {
    $id = htmlspecialchars($_GET["deleteid"]);
    $stmt = $connection->prepare("DELETE FROM posts WHERE id=?");
    //$stmt->bindParam(":id", $id);
    $stmt->execute([$id]);

    if ($stmt) {
?>
        <script type="text/javascript">
            window.location.href = '/cms_guestbook.php';
        </script>
<?php
    }
}
?>

<html>

<head>
    <title>Guestbook CMS</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1 class="welcome">Welcome to Guestbook Management Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Posted at</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>IP Address</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        $result = $connection->query("SELECT * FROM posts");
        foreach ($result as $row) {
            echo ("<tr><td>" . $row['id'] . "</td>");
            echo ("<td>" . $row['posted_at'] . "</td>");
            echo ("<td>" . $row['name'] . "</td>");
            echo ("<td>" . $row['email'] . "</td>");
            echo ("<td class='message'>" . $row['message'] . "</td>");
            echo ("<td>" . $row['ip_address'] . "</td>");
            echo ("<td class='actions'>
                <form action='cms_guestbook.php?deleteid=" . $row['id'] . "' method='POST'>
                <input type='hidden' name='delete' value='" . $row['id'] . "'>
                <input type='submit' name='submit' value='Delete'>
                </form></td>");
            echo ("<td class='actions'>
                <form action='update_post.php?updateid=" . $row['id'] . "' method='POST'>
                <input type='hidden' name='edit' value='" . $row['id'] . "'>
                <input type='submit' name='submit' value='Edit'>
                </form></td></tr>");
        }
        ?>
    </table>
</body>

</html>