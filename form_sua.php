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
        $sql_student = "SELECT * FROM student WHERE ID = '".$id."'";

        $result_student = $conn->query($sql_student);
        $row = $result_student->fetch_assoc();

        $major_id = $_POST['major_id'];
        $sql_major = "SELECT * FROM major";
        $result_major = $conn->query($sql_major);
        $result_all = $result_major->fetch_all();
    ?>
    <body>
        <form action="sua.php" method="post">
            ID:
            <input type="text" name="id" value="<?php echo $row['id']?>"><br>
            Name:
            <input type="text" name="fullname" value=" <?php echo $row['fullname']?>"><br>
            Email:
            <input type="text" name="email" value="<?php echo $row['email']?>"><br>
            Birthday:
            <input type="date" name="birthday" value="<?php echo $row['birthday']?>"><br>
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


