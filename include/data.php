<?php
require_once (__DIR__ . "/databaseconnect.php");
require_once (__DIR__ . "/functions.php");

?>

<?php

//selection
$data_questions_statement = $my_connection->prepare("SELECT id, question FROM table_sondage_questions");
$data_questions_statement->execute();
$data_questions = $data_questions_statement->fetchAll(PDO::FETCH_ASSOC);

//selection
$_statement = $my_connection->prepare("SELECT question FROM table_sondage_questions WHERE id = :id");
$_stat = $my_connection->prepare("SELECT reponse FROM sondage_reponses WHERE id_sondage = :id");

//modification
$update_question = $my_connection->prepare("UPDATE table_sondage_questions SET question= :question_modify WHERE id= :id");

//insertion
$insert_question =  $my_connection->prepare("INSERT INTO table_sondage_questions (question, id) VALUES (:question_add, :id + 1)");
$insert_reponse = $my_connection->prepare("INSERT INTO sondage_reponses (id_sondage, reponse, nb_reponses) VALUES (:id_sondage + 1, :reponse, 0)");

$update_reponse = $my_connection->prepare("INSERT INTO sondage_reponses(id_sondage, reponse, nb_reponses) VALUES (:id_sondage, :reponse, 0)");

//suppression
$delete_reponses = $my_connection->prepare("DELETE FROM sondage_reponses WHERE id_sondage = :id_sondage");
$delete_question = $my_connection->prepare("DELETE FROM table_sondage_questions WHERE id = :id");



//ajouter de nouvelles users;
$ad_users = $my_connection->prepare("INSERT INTO users(full_name, email) VALUES(:full_name, :email)");

//recupere les users et leurs password;
$ad_groups = $my_connection->prepare("SELECT * FROM users");
$ad_groups->execute();

$names =  $my_connection->prepare("SELECT full_name FROM users WHERE email= :mail");

$users = $ad_groups->fetchAll(PDO::FETCH_ASSOC);

$mails = array_column($users, "email");
$passwords = array_column($users, "`pswd");


//$insert_users = $my_connection->prepare("INSERT INTO users(full_name, email, pswd) VALUES(:full_name, :email, :pswd");

?>