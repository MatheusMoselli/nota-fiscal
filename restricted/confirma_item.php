<?php
include '../connect.php';
include "components/restricted.php";

$nf = $_SESSION['nf'];

$consult = "SELECT * FROM itens_nf WHERE Idnf = '$nf'";
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php
include 'components/header.php';
?>


<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item">Adicionando produto</li>
            <li class="breadcrumb-item ativo">Menu da nota</li>
        </ol>
    </nav>

    <form class="formulario text-center">
        <h2>Nofys</h2>
        <div class="form-group">
            <p>NF: <?php echo $nf ?></p>
            <hr>
        </div>
        <?php
        $total = 0;
        foreach ($connection->query($consult) as $line) {
        ?>
            <div class="form-group">
                <p>ID do produto: <?php echo $line['id'] ?></p>
            </div>
            <div class="form-group">
                <p>Quantidade: <?php echo $line['qtde'] ?></p>
            </div>
            <div class="form-group">
                <p>Subtotal: <?php echo $line['subtotal'] ?></p>
            </div>
            <hr>

            <?php
            $total += $line['subtotal'];
            ?>
        <?php
        }
        ?>
        <div class="form-group">
            <p>Total: R$ <?php echo $total ?></p>
        </div>
        <hr>
        <div class="from-group">
            <h3>O que deseja fazer?</h3>
            <a class="btn btn-outline-dark title" href="seleciona_ultima_nf.php" style="border-radius: 8px; padding: 10px; margin: 15px auto;">Inserir outro produto na mesma nota</a> <br>
            <a class="btn btn-outline-dark title" href="finalizar.php?total=<?php echo $total; ?>" style="border-radius: 8px; padding: 10px; margin: 15px auto;">Finalizar a nota</a>
        </div>
    </form>
</div>
<?php
include 'components/footer.php';
?>


</body>

</html>
<!-- end document-->