<?php
    Error_reporting (0);
    session_start();
    include '../connect.php';

    $email = $_POST['your_email'];
    $pass = $_POST['your_pass'];

    $consult = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$pass'";

    $result = $connection -> query($consult);

    $register = $result -> num_rows;

    $result_user = mysqli_fetch_assoc($result);

    if ($register == 1) {
        $_SESSION['idCli'] = $result_user['idCli'];
        $_SESSION['nome'] = $result_user['nome'];
        $_SESSION['email'] = $result_user['email'];

        header('Location: ../restricted/index.php');
    } else {
        header('Location: ./index.html');
    }
?>