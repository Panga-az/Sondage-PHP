<?php
session_start();
require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");
?>

<?php
$post = $_POST;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($post["question"])) || empty(trim($post["reponse"]))) {
        $_SESSION["modify_sondage_error"] = "S'il vous plaît remplissez les champs";
        header("Location: sondage_update.php");
        exit();

    } else {


        $_SESSION["modified_success"] = " Sondage modifier avec Succès";
        $question_modify = $post["question"];
        $reponses_modify = explode("\n", $post["reponse"]);

        //Supprimer toutes les données de la tables et insère les nouvelles données.
        $delete_reponses->execute([
            "id_sondage" => $_SESSION["modify_id"]
        ]);

        foreach ($reponses_modify as $reponse) {
            $update_reponse->execute([
                "reponse" => trim($reponse),
                "id_sondage" => $_SESSION["modify_id"]
            ]);
        }

        //verifier si la question à ajouter existe dèjà.
        $check_question = $my_connection->prepare("SELECT question FROM table_sondage_questions WHERE question= :question");
        $check_question->execute([
            "question" => $question_modify
        ]);
        if($check_question->fetch())
        {
            $_SESSION["question_error"] = "Cette question existe dejà choisissez un autre ou allez-y modifier la question pour l'adapter à vos besoin.";
            header("Location: sondage_update.php");
            exit();
        }


        $update_question->execute([
            "question_modify" => $question_modify,
            "id" => $_SESSION["modify_id"]
        ]);

        header("Location: sondage_update.php?id={$_SESSION["modify_id"]}");
        exit();

    }


} else {
    header("Location: sondage_update.php");
    exit();
}

?>