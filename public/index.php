<?php

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


require("../app/core/init.php");

$app = new App;
$app->loadController();

?>

<script src="https://kit.fontawesome.com/85b199d966.js" crossorigin="anonymous"></script>