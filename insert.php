<?php
include 'db_conn.php';
if (isset($_POST['save'])) {
    $write = $_POST['write'];
    $sql = "INSERT INTO comment (comm)
	 VALUES ('$write')";
    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}