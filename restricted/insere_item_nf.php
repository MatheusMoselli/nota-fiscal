<?php  
    include '../connect.php';
    echo "<br>";

    session_start();

    $nf = $_SESSION['nf'];
    $prod_id = $_POST['id_prod'];
    $qtde = $_POST['qtde'];
    $subtotal = $_POST['subtotal'];

    echo "NF -> ".$nf."<br>";
    echo "ID do produto -> ".$prod_id."<br>";
    echo "Quantidade -> ".$qtde."<br>";
    echo "Subtotal -> ".$subtotal."<br>";
    

    $consult = $connection -> prepare("
        INSERT INTO itens_nf (id, Idnf, qtde, subtotal) VALUES
        ('$prod_id','$nf', '$qtde', '$subtotal')
    ");

    $consult -> execute();
    header('Location: confirma_item.php');
?>