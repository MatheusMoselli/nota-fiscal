<?php
include '../connect.php';
include "components/restricted.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
include 'components/header.php';
?>
<div class="col-sm-12 paddingtop">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Produtos Cadastrados</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $consult = "SELECT * FROM produtos order by preco";

                    foreach ($connection->query($consult) as $line) {
                        echo "<tr>";
                        echo "<td>" . $line['id'] . "</td>";
                        echo "<td>" . $line['nome'] . "</td>";
                        echo "<td>" . $line['preco'] . "</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <a href="./index.php" class="btn btn-outline-light title">
        Voltar
    </a>
</div>



<?php
include 'components/footer.php';
?>
</body>

</html>