<?php 
    include '../connect.php';
    include 'components/restricted.php';

    $nf = $_SESSION['nf'];
    $total = $_GET['total'];

    echo "NF: ".$nf."<br>";
    echo "Total: ".$total."<br>";

    $consult = $connection -> prepare("
        UPDATE nota_fiscal SET valor_total = '$total'
        WHERE Idnf = '$nf'
    ");

    $consult -> execute();

    header("Location: index.php");
?>