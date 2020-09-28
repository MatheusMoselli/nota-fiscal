<?php
    include '../connect.php';

    $name = $_POST['produto'];
    $price = $_POST['preco'];

    $consult = $connection -> prepare("
        INSERT INTO produtos (nome, preco) VALUES
        ('$name','$price')
    ");

    $consult -> execute();

    header('Location: lista_produtos.php')
?>