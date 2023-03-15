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
        // C1: hien thi du lieu bang lenh print_r
        echo "Cach 1<br>";
        print_r($result);
        echo "<br>";
        echo "<br>";

        // C2: hien thi tung dong du lieu bang for
        echo "Cach 2<br>";
        foreach ($result as $value) {
            echo "Id: ". $value['id']. " - Hoten: ". $value['fullname']. " ". $value['email']. " ngaysinh: ". $value['birthday'];
            echo "<br>";
            echo "<br>";
        }
        $result->free_result();

        // C3: hien thi bang html
        echo "Cach 3";
        $result = $conn->query($sql);

        $result_all_c3 = $result->fetch_all();
        print_r($result_all_c3);
        $result->free_result();
        echo "<br>";
        echo "<br>";
//        echo "<table border = 1>
//                <tr>
//                    <th>ID</th>
//                    <th>HoTen</th>
//                    <th>Email</th>
//                    <th>NgaySinh</th>
//                </tr>";
//                foreach ($result_all_c3 as $row) {
//                    $date = date_create($row[3]);
//                    echo "<tr>
//                            <td>".$row[0]."</td>
//                            <td>".$row[1]."</td>
//                            <td>".$row[2]."</td>
//                            <td>".$date->format("d-m-Y")."</td>
//                        </tr>";
//                }
//            "</table>";

        // C4
        echo "Cach 4 <br>";
        $result = $conn->query($sql);
        $result_all_c4 = $result->fetch_array();
        print_r($result_all_c4);
        echo "<br>";
        echo "<br>";
        $result->free_result();

        // C5
        echo "Cach 5 <br>";
        $result = $conn->query($sql);
        while ($result_all_c5 = $result->fetch_row()) {
            echo $result_all_c5[0] ." ".
                $result_all_c5[1] ." ".
                $result_all_c5[2] ." ".
                $result_all_c5[3] ." ".
                $result_all_c5[4] ." ".
                $result_all_c5[5] . "<br>";
        }
        echo "<br>";
        $result->free_result();

        // C6
        echo "Cach 6 <br>";
        $result = $conn->query($sql);

        $i = 0;
        while ($i <= 6) {
            $result_all_c6 = $result->fetch_object();
            print_r($result_all_c6);
            $i++;
            echo "<br>";
        }

        echo "<br>";
        $result->free_result();

    } else {
        echo "0 ket qua tra ve.";
    }
    $conn->close();
?>
