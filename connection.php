<?php
session_start();
require_once (__DIR__ . "/include/data.php");
?>

<?php
$post = $_POST;

if (isset($post["email"]) && isset($post["pswd"])) {
    if (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "EMAIL invalide";
    } else {

        if (in_array($post["email"], $mails) && (in_array($post["pswd"], $passwords))) {

            $_SESSION["connected"] = "connected";

            $names->execute([
                "mail" => $post["email"]
            ]);

            $name = $names->fetch(PDO::FETCH_ASSOC);

            $_SESSION["Welcome"] = sprintf("Bienvenus sur le Site de Sondage ! %s", $name["full_name"]);

            header("Location: index.php");
            exit();

        }

        else
        {
            $_SESSION["error"] = "Email ou Mot de passe incorrect."; 
            $_SESSION["mail"] = $post["email"];
            
            header("Location: index.php");
            exit();
        }

    }
}
?>