<?php
session_start();
require_once (__DIR__ . "/include/data.php");
?>
<?php
unset($_SESSION["connected"]);

header("Location: index.php");
exit();
