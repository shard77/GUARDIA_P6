<?php
require("../app/core/init.php");

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$app = new App;
$app->loadController();

?>

<script src="https://kit.fontawesome.com/85b199d966.js" crossorigin="anonymous"></script>