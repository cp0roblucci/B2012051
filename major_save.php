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

    $sql = "INSERT INTO major
                    VALUES ('".$_POST['id']."', '".$_POST['name_major']."');
                ";
    if($conn->query($sql) == true) {
        echo "Them nganh thanh cong";
        header("Location: major_index.php");
    } else {
        echo "Error: ". $sql . "<br>". $conn->error;
    }
    $conn->close();
?>