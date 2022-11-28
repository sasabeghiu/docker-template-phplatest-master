<?php
require_once("cms_guestbook.php");

if (isset($_POST["edit"])) {
    $id = htmlspecialchars($_GET["updateid"]);
}

if (isset($_POST["update"])) {
    $id = htmlspecialchars($_GET["updateid"]);
    $name = htmlspecialchars($_POST["name"] ?? '');
    $email = htmlspecialchars($_POST["email"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    $stmt = $connection->prepare("UPDATE posts SET posted_at=now(), name=:name, email=:email, message=:message WHERE id=:id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

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
    <title>Edit Post</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Edit post <?php echo $_GET["updateid"]; ?></h1>

    <?php
    $result = $connection->prepare("SELECT * FROM posts WHERE id=?");
    $result->execute([$_GET["updateid"]]);
    foreach ($result as $row) {
        $name =  $row['name'];
        $email =  $row['email'];
        $message = $row['message'];
    ?>
        <form method="POST">
            <input type='text' name='name' placeholder='<?php echo $name; ?>' />
            <input type='text' name='email' placeholder='<?php echo $email; ?>' />
            <input type='text' name='message' placeholder='<?php echo $message; ?>' />
            <input type='hidden' name='update' value='<?php echo $row['id']; ?>'>
            <input type='submit' name='submit' value='Update'>
        </form>
    <?php
    }
    ?>

</html>