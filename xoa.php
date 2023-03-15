<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlsv";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connetion failed: ". $conn->connect_error);
    }

    $id = $_POST['id'];

    $sql = "DELETE FROM student WHERE ID = '".$id."'";

    if($conn->query($sql) == true) {
        header("Location: taidulieu_bang1.php");
    } else {
        echo "Error: ". $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
