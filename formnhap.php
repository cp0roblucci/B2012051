<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    $sql = "SELECT * FROM major";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $result = $conn->query($sql);
        $result_all = $result->fetch_all();
    } else {
        echo "0 ket qua tra ve.";
    }
    $conn->close();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form Add</title>
    </head>
    <body>
        <form action="luu.php" method="post">
            Name:
            <input type="text" name="name"><br>
            Email:
            <input type="text" name="email"><br>
            Birthday:
            <input type="date" name="birthday"><br>
            Major:
            <select name="major" id="">
                <?php
                    foreach ($result_all as $value) {
                        echo "<option value=$value[0]>$value[1]</option>";
                    }
                ?>
            </select><br>
            <input type="submit">
        </form>
    </body>
</html>