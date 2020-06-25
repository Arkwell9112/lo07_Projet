<!-- ----- debut config -->
<?php
// Configuration de la base de données
$dsn = 'mysql:dbname=bergeedo;host=localhost;charset=utf8';
$username = 'bergeedo';
$password = 'v2rsUsd1';

// chemin absolu vers le répertoire du projet SUR DEV-ISI
$root = "/home/etu/bergeedo/www/lo07_tp/projet" . "/";

require_once("debug.php");

if (DEBUG) {
    echo("<ul>");
    echo(" <li>dsn = $dsn</li>");
    echo(" <li>username = $username</li>");
    echo(" <li>password = $password</li>");
    echo("<li>---</li>");
    echo(" <li>root = $root</li>");
    echo("</ul>");
}
?>
<!-- ----- fin config -->