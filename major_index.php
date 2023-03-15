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
        $result_all = $result->fetch_all(MYSQLI_ASSOC);
        echo "<br>";
        echo "<h1>Bang du lieu nganh</h1>";
        echo "<table border = 1>
                        <tr>
                            <th>Ma nganh</th>
                            <th>Ten nganh</th>
                            <th colspan='2'>Hanh dong</th>
                        </tr>";
        ?>
        <?php
        foreach ($result_all as $row) {
            echo "<tr>
                  <td>".$row['id']."</td>
                  <td>".$row['name_major']."</td><td>";
            ?>
            <form action="major_xoa.php" method="post">
                <input type="submit" name="action" value="xoa"/>
                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
            </form>
            <?php
            echo "</td>";
            echo "<td>";
            ?>
            <form action="major_edit.php" method="post">
                <input type="submit" name="action" value="sua"/>
                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
            </form>
            <?php
            echo "</td></tr>";
        }
        echo "</table>";
        ?>
        <form action="major_add.php">
            <input type="submit" value="Add">
        </form>
        <?php
    } else {
        echo "0 ket qua tra ve.";
    }
    $conn->close();
?>
