<?php 
    require_once('DBconnection.php');
    // checking if the email aready exists on the database or not:
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i][1] == trim($_POST['email1'])) {
            exit('Email Already Exist');
        }
    }

    if ($_POST['password1'] != $_POST['confirm-password']) {
        exit('not the same password');
    }else {
        $sqlInsertData = "INSERT INTO `users` (`email`, `password`) VALUES
        ('{$_POST['email1']}', '{$_POST['password1']}')";
        mysqli_query($conn, $sqlInsertData);
    }
    mysqli_close($conn);
?>