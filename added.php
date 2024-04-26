<?php
session_start();
require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");
?>
<?php

// Vérifier que le formulaire a été soumis via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Correction des accès aux variables POST
    if (empty(trim($_POST["question"])) || empty(trim($_POST["reponse"]))) {
        $_SESSION["add_sondage_error"] = "S'il vous plaît, remplissez tous les champs.";
        header("Location: sondage_ajouter.php");
        exit();
    } else {
        $_SESSION["added_success"] = "Sondage ajouté avec succès !";
        $question_add = $_POST["question"];
        $reponses_add = explode("\n", $_POST["reponse"]);

        $insert_question->execute([
            "question_add" => $question_add,
            "id" => $_SESSION["current_question_id"]
        ]);

        foreach ($reponses_add as $reponse) {
            if (!empty(trim($reponse))) {
                $insert_reponse->execute([
                    "reponse" => trim($reponse),
                    "id_sondage" => $_SESSION["current_question_id"]
                ]);
            }
        }

        header("Location: sondage_ajouter.php");
        exit();
    }
} else {
    // Redirection si la page est accédée sans méthode POST
    header("Location: sondage_ajouter.php");
    exit();
}
?>