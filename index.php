<?php
require_once (__DIR__ . "/include/data.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <style>
        .centered-list {
            display: flex;
            justify-content: center;
            list-style-type: none;
            /* enlève les puces */
            padding: 0;
            /* enlève le padding par défaut */
        }
    </style>
</head>

<body>

    <?php if (isset($_SESSION["connected"])): ?>

        <?php require_once (__DIR__ . "/include/header.php") ?>
        <div class="vh-30 d-flex justify-content-center align-items-center">
            <div class="container text-center">

                <!--Si l'utilisateur est connecté-->
                <?php if (isset($_SESSION["Welcome"])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION["Welcome"]; ?>
                    </div>
                    <?php unset($_SESSION["Welcome"]); ?>
                <?php endif; ?>
                
                <h2> Voici la liste des sondages Actuelles.</h2>

                <!--Si l'utilisateur supprime un sondage-->
                <?php if (isset($_SESSION["delete_done"])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["delete_done"]; ?>
                    </div>
                    <?php unset($_SESSION["delete_done"]); ?>
                <?php endif; ?>

                <?php foreach ($data_questions as $question): ?>
                    <h3>
                        <a
                            href="sondage.php?id=<?php echo $question['id']; ?>"><?php echo "</br>" . $question["question"]; ?></a>
                    </h3>
                    <ul class="list-group list-group-horizontal centered-list">
                        <li class="list-group-item"><a class="link-warning"
                                href="sondage_update.php?id=<?php echo ($question['id']); ?>">Editer</a></li>
                        <li class="list-group-item"><a class="link-danger"
                                href="sondage_delete.php?id=<?php echo ($question['id']); ?>">Supprimer</a></li>
                    </ul>
                    <?php $_SESSION["current_question_id"] = $question['id']; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php require_once (__DIR__ . "/include/footer.php") ?>
    <?php else: ?>
        <?php include_once (__DIR__ . "/include/user.php") ?>
    <?php endif; ?>
</body>





</html>