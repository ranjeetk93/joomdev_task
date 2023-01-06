<?php
include "db_conn.php";
$result = mysqli_query($conn, "SELECT * FROM comment order by id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "db_conn.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body class="mt-4">
    <form action="insert.php" method="POST">
        <div class="form-outline col-md-6">
            <input type="text" name="write" class="form-control" placeholder="write something" />
            <button class="btn btn-primary mt-4" name="save" type="sumbit">Submit</button>
    </form>

    <?php
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="table mt-4">

        <tr>
            <td><b>ID</b></td>
            <td><b>Comments</b></td>
        </tr>
        <?php
$i = 0;
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["comm"]; ?></td>
        </tr>
        <?php
$i++;
    }
    ?>
    </table>
    <?php
} else {
    echo "No result found";
}
?>

    </div>
</body>

</html>