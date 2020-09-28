<?php
include "../connect.php";
/* Parte Restrita */
Error_reporting (0);
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


$nf = $_SESSION['nf'];
$id_prod = $_POST['produto_opcao'];
$qtde_prod = $_POST['qtde'];

$consult = "SELECT preco,nome FROM produtos WHERE id='$id_prod'";
$consult = $connection->query($consult);

$line = $consult->fetch_assoc();

$price = $line['preco'];
$name = $line['nome'];

$subtotal = $price * $qtde_prod;
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
include 'components/header.php';
include "components/restricted.php";
?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item ativo">Adicionando produto</li>
            <li class="breadcrumb-item">Menu da nota</li>
        </ol>
    </nav>


    <form action="insere_item_nf.php" method="post" class="formulario text-center">
        <h2>Nofys</h2>
        <p class="lead">NF: <?php echo $nf ?></p>
        <div class="form-group inputwidth">
            <label>ID do produto</label>
            <input class="form-control inputwidth" type="text" name="id_prod" id="id_prod" value="<?php echo $id_prod; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Produtos</label>
            <input class="form-control inputwidth" type="text" name="nome_prod" value="<?php echo $name; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Valor unitário (Em R$)</label>
            <input class="form-control inputwidth" type="text" name="valor_unit" value="<?php echo $price; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input class="form-control inputwidth" type="text" name="qtde" value="<?php echo $qtde_prod; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Subtotal (Em R$)</label>
            <input class="form-control inputwidth" type="text" name="subtotal" value="<?php echo $subtotal; ?>" readonly="readonly">
        </div>
        <div class="form-group">
            <input class="btn btn-outline-dark title" type="submit" value="Adicionar produto à nota">
        </div>
    </form>

        <?php
        include 'components/footer.php';
        ?>
        </body>

</html>
<!-- end document-->