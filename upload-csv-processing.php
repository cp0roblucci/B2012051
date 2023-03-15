<?php
$target_file = basename($_FILES["fileCsv"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['submit'])) {
    // Check file size
    if ($_FILES["fileCsv"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($fileType != "csv") {
        echo "Sorry, only CSV files are allowed.";
        $uploadOk = 0;
    }

//    if (file_exists($target_file)) {
//        echo "Sorry, file already exists.";
//        $uploadOk = 0;
//    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileCsv"]["name"])). " has been uploaded.";
        echo '<br>';
        $file = file($_FILES['fileCsv']['name'], FILE_IGNORE_NEW_LINES);

        read_file_csv_insert_db($file);
    }
}
function read_file_csv_insert_db($file) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    foreach ($file as $value) {
        // cat chuoi khi doc file csv
        $arr = explode(',', $value);
        $date = date_create($arr[2]);
        $date = date_format($date, "Y-m-d");
        $password = md5($arr[3]);
        $sql = "INSERT INTO customers (fullname, email, birthday, password, img_profile)
                    VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $arr[0], $arr[1], $date, $password, $arr[4]);
        $stmt->execute();
    }
    echo 'cap nhat csdl thanh cong!<br>';
    echo '<a href="homepage.php">Trang chu</a>';
}

?>