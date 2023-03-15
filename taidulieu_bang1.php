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

    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $result = $conn->query($sql);
        $result_all = $result->fetch_all(MYSQLI_ASSOC);
        echo "<br>";
        echo "<h1>Bang du lieu sinh vien</h1>";
        echo "<table border = 1>
                    <tr>
                        <th>ID</th>
                        <th>Ho Ten</th>
                        <th>Email</th>
                        <th>Ngay Sinh</th>
                        <th>Ma nganh</th>
                        <th>Ten nganh</th>
                        <th colspan='2'>Hanh dong</th>
                    </tr>";
?>
<?php
    foreach ($result_all as $row) {
    $date = date_create($row['birthday']);
    $sql = "Select name_major from major where ID = '".$row['major_id']."'";
    $result = $conn->query($sql);
    $value = $result->fetch_all();
    echo "<tr>
              <td>".$row['id']."</td>
              <td>".$row['fullname']."</td>
              <td>".$row['email']."</td>
              <td>".$date->format("d-m-Y")."</td>
              <td>".$row['major_id']."</td>
              <td>".$value[0][0]."</td><td>";
?>

    <form action="xoa.php" method="post">
        <input type="submit" name="action" value="xoa"/>
        <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
    </form>
<?php
    echo "</td>";
        echo "<td>";
?>
    <form action="form_sua.php" method="post">
        <input type="submit" name="action" value="sua"/>
        <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
        <input type="hidden" name="major_id" value="<?php echo $row['major_id']?>"/>
    </form>
<?php
    echo "</td></tr>";
        }
       echo "</table>";
    } else {
        echo "0 ket qua tra ve.";
    }
    $conn->close();
?>
