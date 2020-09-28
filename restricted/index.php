<?php
include '../connect.php';

session_start();

/* Verificação de Restrita */

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

/* Gráficos */

$sql = "SELECT * FROM produtos";
$search = mysqli_query($connection, $sql);

$json = [];
$json2 = [];

while ($data = mysqli_fetch_array($search)) {
    $products = $data['nome'];
    $price = $data['preco'];
    $id = $data['id'];

    $json[] = $products;
    $json2[] = $price;
}

$sqlNota = "SELECT * FROM nota_fiscal";
$searchNota = mysqli_query($connection, $sqlNota);

$jsonNotaId = [];
$jsonNotaValor = [];

while ($dataNota = mysqli_fetch_array($searchNota)) {
    $id = $dataNota['Idnf'];
    $total = $dataNota['valor_total'];

    $jsonNotaId[] = $id;
    $jsonNotaValor[] = $total;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
include 'components/header.php';
?>

<?php
if ($connection->connect_error) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        [ERROR] - Por favor, tente se conectar novamente
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
} else {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Conectado com sucesso!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
}
?>


<!-- PAGE CONTENT-->
<div class="containter">
    <div class="jumbotron text-center  jumbotron-dark">
        <h1 class="display-4">Bem vindo, <?php echo $_SESSION['nome']; ?></h1>
        <p class="lead">
            Está é a página inicial do projeto Nofys. Para criar suas notas, basta clicar no botão "Emitir nota", logo acima. <br>
            Nesta página você também encontrará <mark>gráficos</mark> que possuem maiores detalhes sobre suas vendas
        </p>

        <p>Para sair da sua conta, apenas clique no botão abaixo:</p>

        <a href="logout.php" class="btn btn-outline-light sair">
            Sair
        </a>
    </div>

    <div class="container" id="grafico">
        <h1>Gráficos</h1>
        <p>A seguir, você encotrará gráficos com maiores detalhes sobre os produtos e as notas fiscais.</p>
        <p>Nota: Os gráficos podem não estar funcionando caso você esteja mexendo pelo celular.</p>
    </div>

    <!-- GRÁFICOS -->
    <div class="graficos">
        <div class="chart-container" style="height:20vh; width:40vw; margin: 0 auto; margin-bottom: 50%;">
            <canvas id="myChart" class="graphics"></canvas>
            <canvas id="valorId" class="graphics"></canvas>
        </div>
    </div>

</div>

<?php
include 'components/footer.php';
?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($json); ?>,
            datasets: [{
                label: 'Produtos / preços',
                backgroundColor: 'rgb(151,221,230)',
                borderColor: 'rgb(151,209,203)',
                data: <?php echo json_encode($json2); ?>,
            }]
        },

        // Configuration options go here
        options: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: 'white',
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('valorId').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($jsonNotaId); ?>,
            datasets: [{
                label: 'Notas / Valor total',
                backgroundColor: 'rgb(151,221,230)',
                borderColor: 'rgb(151,209,203)',
                data: <?php echo json_encode($jsonNotaValor); ?>,
            }]
        },

        // Configuration options go here
        options: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: 'white',
                }
            }
        }
    });
</script>
</body>

</html>
<!-- end document-->