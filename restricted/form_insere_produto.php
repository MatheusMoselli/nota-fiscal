<!DOCTYPE html>
<html lang="pt-br">

<?php
include 'components/header.php';
include "components/restricted.php";
?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cadastro dos produtos</li>
        </ol>
    </nav>
    <div class="card-body card-block">
        <form action="insere_produto.php" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class="form-control-label">Nome do Produto</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="produto" placeholder="Ex: Leite" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="preco" class=" form-control-label">Preço (separar por ".")</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="auto" name="preco" placeholder="Ex: 5.99" class="form-control">
                </div>
            </div>

            <hr class="products">

            <div class="row form-group">
                <div class="col col-md-1">
                    <input type="submit" class="btn btn-primary btn-sm" value="Cadastrar">

                </div>
                <div class="col col-md-1">
                    <input type="reset" class="btn btn-danger btn-sm" value="Limpar">
                </div>

            </div>
        </form>

        <a href="./index.php" class="btn btn-outline-light title">
            Voltar
        </a>

    </div>
</div>


<?php
include 'components/footer.php';
?>
</body>

</html>