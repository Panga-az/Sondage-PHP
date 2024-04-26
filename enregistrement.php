<?php
session_start();
require_once (__DIR__ . "/include/data.php");
require_once (__DIR__ . "/include/databaseconnect.php");
?>

<?php
$post = $_POST;

if (isset($post["email"]) && isset($post["pswd"]) && isset($post["name"])) {

    if (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "EMAIL invalide";
    } else {

        // Préparer la requête pour rechercher l'email
        $check_email = $my_connection->prepare("SELECT email FROM users WHERE email = :email");
        $check_email->execute([
            "email" => $post["email"]
        ]);

        // Vérifier si un email existe déjà
        if ($check_email->fetch()) {
            $_SESSION["email_error"] = "Cet email est déjà utilisé. Veuillez utiliser un autre email.";
            header("Location: index.php");
            exit();
        } else {

            $insert_users = $my_connection->prepare("INSERT INTO users(full_name, email, pswd) VALUES(:full_name, :email, :pswd)");
            $insert_users->execute([
                "full_name" => $post["name"],
                "email" => $post["email"],
                "pswd" => $post["pswd"]
            ]);
            $_SESSION["connected"] = "connected";

            $_SESSION["Welcome"] = sprintf("Utilisateur enregistré avec succès! Bienvenus sur le Site de Sondage ! %s", $post["name"]);
            header("Location: index.php");
            exit();
        }
    }
}
?>