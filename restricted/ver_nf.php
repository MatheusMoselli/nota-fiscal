<?php
include "../connect.php";

include "components/restricted.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
include 'components/header.php';
?>

<div class="container">
    <h2 class="text-center title">Lista de Notas Cadastradas</h2>
    <p>
        Aqui você encotrará todas as notas fiscais já cadastradas.
    </p>


    <?php

    $qntdNFS = "SELECT * FROM nota_fiscal";
    foreach ($connection->query($qntdNFS) as $nf) {
        $id = $nf['Idnf']
    ?>
        <div class="tables">


            <table class="table table-bordered table-hover table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NF</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor total (R$)</th>

                        <?php
                        $second_consult = "SELECT * FROM itens_nf WHERE Idnf = '$id'";
                        foreach ($connection->query($second_consult) as $second_line) {
                            $code = $second_line['id'];
                            $third_consult = "SELECT * FROM produtos WHERE id = '$code'";

                            foreach ($connection->query($third_consult) as $third_line) {
                        ?>
                                <th scope="col">ID do produto</th>
                                <th scope="col">Produto</th>
                        <?php
                            }
                        }

                        ?>

                    </tr>
                </thead>

                <tbody>

                    <?php

                    $consult = "SELECT * FROM nota_fiscal WHERE Idnf = '$id'";
                    foreach ($connection->query($consult) as $line) {
                    ?> <tr> <?php
                        ?> <th scope="row"><?php echo $line['Idnf']; ?></th>
                            <td><?php echo $line['data']; ?></td>
                            <td class="bg-success"><?php echo $line['valor_total']; ?></td>

                            <?php
                            $note = $line['Idnf'];
                            $second_consult = "SELECT * FROM itens_nf WHERE Idnf = '$note'";

                            foreach ($connection->query($second_consult) as $second_line) {
                            ?>
                                <td><?php echo $second_line['id']; ?></td>

                                <?php
                                $code = $second_line['id'];

                                $third_consult = "SELECT * FROM produtos WHERE id = '$code'";

                                foreach ($connection->query($third_consult) as $third_line) {
                                ?>
                                    <td><?php echo $third_line['nome']; ?></td>
                            <?php

                                }
                            }
                            ?>
                        </tr> <?php
                            }
                                ?>

                </tbody>
            </table>
        </div>
    <?php
    }
    ?>


    <div class="container">
        <p><a href="index.php" class="btn btn-outline-light title">Voltar para o ínicio</a></p>
    </div>
    <?php
    include 'components/footer.php';
    ?>
    </body>

</html>