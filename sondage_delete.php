<?php
session_start();
require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");

?>

<?php


$delete_reponses->execute([
    "id_sondage" => $_GET["id"]
]);


$delete_question->execute([
    "id" => $_GET["id"]
]);

$_SESSION["delete_done"] = "Sondage Supprimé avec succes !";

header("Location: index.php");
exit();
?>