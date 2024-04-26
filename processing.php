<?php

session_start();

require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");

$post = $_POST;

if (!isset($post["choix"]) || !isset($post["sondage_en_cours"])) {
    require_once (__DIR__ . "/include/header.php");
    $_SESSION["process_error"] = "S'il vous plaît cocher une case !";
    header("Location: sondage.php?id={$_SESSION["id_"]}");
    exit();
} else {
    $_SESSION["process_success"] = "Merci d'avoir vôter !";
    $vote = $my_connection->prepare("UPDATE sondage_reponses SET nb_reponses = nb_reponses + 1 WHERE id_sondage = :id_sondage AND id = :id");

    $vote->execute([
        "id_sondage" => $post["sondage_en_cours"],
        "id" => $post["choix"]
    ]);

    $re = $my_connection->prepare("SELECT reponse, nb_reponses FROM sondage_reponses WHERE id_sondage=:id");
    $re->execute([
        "id" => $post["sondage_en_cours"]
    ]);
    $r = $re->fetchAll(PDO::FETCH_ASSOC);

    $values = array_column($r, "reponse");
    $nb_reponse = array_column($r, "nb_reponses");


    $somme = array_sum($nb_reponse);

    $nb_sondage = count($values);

    $_SESSION["somme"] = $somme;
    $_SESSION["values"] = $values;
    $_SESSION["nb_sondage"] = $nb_sondage;
    $_SESSION["nb_reponse"] = $nb_reponse;


    header("Location: sondage.php?id={$_SESSION["id_"]}");
    exit();
}
?>