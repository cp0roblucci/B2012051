<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection falied: ". $conn->connect_error);
    }

    $id = $_POST['id'];
    $sql = "SELECT * FROM major WHERE ID = '".$id."'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <body>
    <?php print_r($row)?>
    <form action="major_edit_save.php" method="post">
        ID:
        <input type="text" name="id" value="<?php echo $row['id']?>"><br>
        Name:
        <input type="text" name="name_major" value=" <?php echo $row['name_major']?>"><br>
        <input type="submit">
    </form>
    </body>
</html>


