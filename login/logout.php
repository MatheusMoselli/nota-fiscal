<?php
    session_start();

    unset(
        $_SESSION['idCli'],
        $_SESSION['nome'],
        $_SESSION['email']
    );

    header('Location: ../landing-page/')
?>