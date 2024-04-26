<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat Sondage</title>
</head>

<body>
    <?php require_once (__DIR__ . "/include/header.php"); ?>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3>Résultats du Sondage "<cite><?php  echo $_SESSION["titre_sondage"]; ?></cite>"</h3>
        </div>

        <?php for ($i = 0; $i < $_SESSION["nb_sondage"]; $i++): ?>
            <?php $pourcentage = round(($_SESSION["nb_reponse"][$i] * 100) / $_SESSION["somme"], 1); ?>
            <div class="d-flex justify-content-center align-items-center mb-2">
                <div class="pe-2" style="min-width: 150px;"><?= htmlspecialchars($_SESSION["values"][$i]); ?>:</div>
                <div><strong><?= $pourcentage; ?>%</strong></div>
            </div>
        <?php endfor; ?>

        <div class="text-center p-3">
            <div class="alert alert-info" role="alert">
                Nombre total de votes : <?=  $_SESSION["somme"]; ?>
            </div>
        </div>
    </div>
</body>

</html>