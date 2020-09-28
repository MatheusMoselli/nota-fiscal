<?php
/* Restrita */
session_start();

if (
    (!isset($_SESSION['IdCli']) == true) &&
    (!isset($_SESSION['nome']) == true) &&
    (!isset($_SESSION['email']) == true)
) {

    unset($_SESSION['idCli']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    header('Location: ../landing-page/index.html');
}
?>