<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connect
    if($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    $date = date_create($_POST['birthday']);

    $sql = "INSERT INTO student (fullname, email, birthday, major_id)
                VALUES ('".$_POST['name']."',
                        '".$_POST['email']."',
                        '".$date->format("Y-m-d")."',
                        '".$_POST['major']."');
            ";
    if($conn->query($sql) == true) {
        echo "Them sinh vien thanh cong";
        header("Location: taidulieu_bang1.php");
    } else {
        echo "Error: ". $sql . "<br>". $conn->error;
    }
    $conn->close();
?>