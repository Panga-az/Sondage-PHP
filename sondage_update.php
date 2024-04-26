<?php
session_start();
require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");

$question = null;
$reponse = [];

if (isset($_GET["id"])) {
    $_SESSION["modify_id"] = $_GET["id"];

    //requete pour selectionner la question via  son id .
    $_statement->execute([
        "id" => $_SESSION["modify_id"]
    ]);
    $question = $_statement->fetch(PDO::FETCH_ASSOC);

    //requete pour selectionner toutes les reponses associer à la question grace à l'id de la question.
    $_stat->execute([
        "id" => $_SESSION["modify_id"]
    ]);
    $reponse = $_stat->fetchAll(PDO::FETCH_ASSOC);
}
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
        Bienvenue dans la page de Modification.

        <div class="container">

            <form action="updated.php" method="post">

                <?php if (isset($_SESSION["modify_sondage_error"])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["modify_sondage_error"]; ?>
                    </div>
                    <?php unset($_SESSION["modify_sondage_error"]); ?>
                    
                <?php elseif (isset($_SESSION["modified_success"])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION["modified_success"]; ?>
                    </div>
                    <?php unset($_SESSION["modified_success"]); ?>

                    <?php if (isset($_SESSION["question_error"])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION["question_error"]; ?>
                        </div>
                        <?php unset($_SESSION["question_error"]); ?>
                    <?php endif; ?>

                <?php endif; ?>

                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" class="form-control" id="question" name="question"
                        aria-describedby="question-help" value="<?php echo htmlspecialchars($question['question']); ?>">
                    <div id="question-help" class="form-text">La question à modifier.</div>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" id="reponse"
                        name="reponse"><?php echo implode("\n", array_column($reponse, 'reponse')); ?></textarea>
                    <div class="form-text">Les réponses à modifier.</div>
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</body>
<?php require_once (__DIR__ . "/include/footer.php") ?>

</html>