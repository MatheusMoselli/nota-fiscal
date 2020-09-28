<?php
    include '../connect.php';
    $now = $_POST['date'];

    $consult = $connection -> prepare("
        INSERT INTO nota_fiscal (data) VALUES ('$now')
    ");

    $consult -> execute();

    header('Location: seleciona_ultima_nf.php');
?>