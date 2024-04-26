<?php
session_start();

$table_graph = ["pie", "doughnut", "polarArea"];
$canvas_ids = ["myChart1", "myChart2", "myChart3"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique</title>

</head>

<body>
    <?php require_once (__DIR__ . "/include/header.php"); ?>
    <div class="container mt-5">
        <div class="text-center p-3">
            <h3>Graphique des resultats du Sondage : <cite><?php echo $_SESSION["titre_sondage"] ?></cite></h3>
        </div">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Pie</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="doughnut-tab" data-bs-toggle="tab" data-bs-target="#doughnut"
                        type="button" role="tab" aria-controls="doughnut" aria-selected="false">Doughnut</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="polarArea-tab" data-bs-toggle="tab" data-bs-target="#polarArea"
                        type="button" role="tab" aria-controls="polarArea" aria-selected="false">Polar Area</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <canvas id="myChart1" ></canvas>
                </div>
                <div class="tab-pane fade" id="doughnut" role="tabpanel" aria-labelledby="doughnut-tab">
                    <canvas id="myChart2" ></canvas>
                </div>
                <div class="tab-pane fade" id="polarArea" role="tabpanel" aria-labelledby="polarArea-tab">
                    <canvas id="myChart3" ></canvas>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script type="module">
            import { plot } from './js/index.js';
            const values = <?php echo json_encode($_SESSION["values"]); ?>;
            const nb_reponse = <?php echo json_encode($_SESSION["nb_reponse"]); ?>;
            plot("myChart1", "pie", values, nb_reponse);
            plot("myChart2", "doughnut", values, nb_reponse);
            plot("myChart3", "polarArea", values, nb_reponse);
        </script>

</body>
<?php require_once (__DIR__ . "/include/footer.php") ?>

</html>