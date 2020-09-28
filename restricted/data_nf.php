<?php
include '../connect.php';
include "components/restricted.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
include 'components/header.php';
?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ativo">Data</li>
            <li class="breadcrumb-item">Adicionando produto</li>
            <li class="breadcrumb-item">Menu da nota</li>
        </ol>
    </nav>

    <form action="gera_nf.php" method="post" class="formulario text-center">
        <h2>Nofys</h2>
        <div class="form-group mgtop">
            <label>Data de emissão</label>
            <input class="form-control inputwidth" type="date" name="date" placeholder="Escolhe a data">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline-dark title" style="border-radius: 8px; padding: 10px;" value="Continuar">
        </div>
    </form>

</div>
<?php
include 'components/footer.php';
?>

</body>

</html>
<!-- end document-->