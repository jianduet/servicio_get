<?php

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "C:/xampp/htdocs/estudiarphp/proyectoapi/error_log");



require_once "controllers/routes.controller.php";

$index = new routescontroller();
$index -> index();