<?php

session_start();

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    $uname = validate($_POST['username']);

    $pass = validate($_POST['password']);
    // print_r($pass);die;

    if (empty($uname)) {

        header("Location: index.php?error=username is required");

        exit();

    } else if (empty($pass)) {

        header("Location: index.php?error=password is required");

        exit();

    } else {

        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            } else {

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        } else {

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

} else {

    header("Location: index.php");

    exit();

}