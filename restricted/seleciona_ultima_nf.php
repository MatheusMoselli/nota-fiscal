<?php
include '../connect.php';
include "components/restricted.php";

$consult = "SELECT MAX(Idnf) as ultima FROM nota_fiscal";
$consult = $connection->query($consult);

$line = $consult->fetch_assoc();

$last = $line['ultima'];

$_SESSION['nf'] = $last;
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
            <li class="breadcrumb-item  ativo">Adicionando produto</li>
            <li class="breadcrumb-item">Menu da nota</li>
        </ol>
    </nav>


    <form action="insere_item.php?Idnf='<?php echo $last; ?>'" method="post" class="formulario text-center">
        <h2>Nofys</h2>
        <div class="form-group">
            <label>NF: </label>
            <input class="form-control inputwidth" type="text" name="nf" value="<?php echo $last; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Produto</label>
            <select class="form-control inputwidth" name="produto_opcao" id="produto_opcao">
                <?php
                $consult = "SELECT * FROM produtos";
                foreach ($connection->query($consult) as $line) {
                ?>
                    <option value="<?php echo $line['id']; ?>">
                        <?php echo $line['nome']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input class="form-control inputwidth" type="number" name="qtde">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline-dark title" value="Adicionar">
        </div>

</div>


<?php
include 'components/footer.php';
?>

</body>

</html>
<!-- end document-->