<?php
session_start();

require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");

?>

<?php
// Récupérer les réponses associées à la question en cours
//$question_id = $question['id'];
$data_response_statement = $my_connection->prepare("SELECT id, reponse FROM sondage_reponses WHERE id_sondage = :question_id");
$data_response_statement->execute(["question_id" => $_GET["id"]]);
$data_responses = $data_response_statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET["id"]) && !empty($data_responses)) {
    $_SESSION["id_"] = $_GET["id"];
} else {

    require_once (__DIR__ . "/include/header.php");
    echo "
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'>
    <div class='alert alert-danger' role='alert'>
        Ce sondage n'a pas encore de questions pour le moment !
    </div>
    ";
    return;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondage</title>


</head>

<body>
    <?php require_once (__DIR__ . "/include/header.php") ?>

    <form action="processing.php" method="post" class="mt-4">

        <?php if (isset($_SESSION["process_error"])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["process_error"]; ?>
            </div>
            <?php unset($_SESSION["process_error"]); ?>
        <?php elseif (isset($_SESSION["process_success"])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION["process_success"]; ?>

                <?php $_SESSION["ok"] = "vote" ?>

            </div>
            <?php unset($_SESSION["process_success"]); ?>
        <?php endif; ?>
        <div class="container">
            <div class="text-center">
                <h2 class="mb-4">Question du Sondage</h2>
                <p class="lead">
                    <?php
                    $_statement->execute(["id" => $_GET["id"]]);
                    $s = $_statement->fetchAll(PDO::FETCH_ASSOC);
                    echo htmlspecialchars($s[0]['question']);
                    ?>
                    <?php $_SESSION["titre_sondage"] = $s[0]['question']; ?>

                </p>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="list-group">
                        <?php foreach ($data_responses as $data_response): ?>
                            <label class="list-group-item list-group-item-action">
                                <input type="radio" name="choix" value="<?= htmlspecialchars($data_response['id']); ?>"
                                    class="me-2">
                                <?= stripslashes(htmlentities(trim($data_response['reponse']))); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <input type="hidden" name="sondage_en_cours" value="<?= htmlspecialchars($_GET["id"]); ?>">

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Voter</button>
            </div>
        </div>
    </form>




</body>

</html>
