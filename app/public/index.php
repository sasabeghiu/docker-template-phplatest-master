<?php
require_once("dbconfig.php");

//1. Establish database connection
try {
    $connection = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo ("Connected successfully");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!-- 2. HTML form -->
<html>

<head>
    <title>Guestbook</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Write something in our guestbook!</h1>

    <form method="POST">
        <div class="form-field">
            <label>Name:</label>
            <input type="text" id="name" name="name" />
        </div>
        <div class="form-field">
            <label>Message:</label>
            <textarea name="message"></textarea>
        </div>
        <div class="form-field">
            <label>&nbsp;</label>
            <input type="submit" value="Send">
        </div>
    </form>

    <h1><?php echo "$databasename"; ?></h1>

    <?php
    //3. Check if form was submitted
    if (isset($_POST["name"])) {
        //sanitize inputs
        $name = htmlspecialchars($_POST["name"]);
        $message = htmlspecialchars($_POST["message"]);

        //insert data
        $stmt = $connection->prepare("INSERT INTO posts 
                                            (name, message, posted_at, ip_address) 
                                            VALUES 
                                            (:name, :message, now(), :ip_address)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']);

        $stmt->execute();
    }

    //4. Display data
    $result = $connection->query("SELECT * FROM posts");
    foreach ($result as $row) {
    ?>
        <p>
            <?php
            echo nl2br("<b>" . $row['name'] . "</b>\n \n");
            echo nl2br($row['message'] . "\n \n");
            echo nl2br("<i>Posted at: " . $row['posted_at'] . "</i>\n \n");
            ?>
        </p>
    <?php
    }
    // if server req method === get if isset get id id=get id -: delete id
    ?>
</body>

</html>