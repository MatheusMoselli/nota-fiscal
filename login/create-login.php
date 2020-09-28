<?php
    include '../connect.php';

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $consult = $connection -> prepare("INSERT INTO cliente 
        (nome, sobrenome, email, senha) VALUES
        ('$name','$lastname','$email','$password')
    ");

    $consult -> execute();

    header('Location: index.html')
?>