<?php
session_start();

require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Modification</title>
</head>

<body>
    <?php require_once (__DIR__ . "/include/header.php") ?>

    <div class="text-center p-3">
        Bienvenue dans la page d'ajout.

        <div class="container">
            <form action="added.php" method="post">
                <?php if (isset($_SESSION["add_sondage_error"])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["add_sondage_error"]; ?>
                    </div>
                    <?php unset($_SESSION["add_sondage_error"]); ?>
                <?php elseif (isset($_SESSION["added_success"])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION["added_success"]; ?>
                    </div>
                    <?php unset($_SESSION["added_success"]); ?>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" class="form-control" id="question" name="question"
                        aria-describedby="question-help">
                    <div id="question-help" class="form-text">La question à ajouter.</div>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" id="reponse" name="reponse"></textarea>
                    <div class="form-text">Les réponses à ajouter.</div>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>

</body>

<?php require_once (__DIR__ . "/include/footer.php") ?>

</html>