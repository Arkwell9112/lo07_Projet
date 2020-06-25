<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>
    <body>
    <div class="container">
<?php
include $root . '/app/view/fragment/fragmentCaveMenu.html';
include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
if ($result == 1) {
    echo("<h3>La note est bien prise en compte.</h3>");
    echo("<ul>");
    echo("<li>ID = " . $vin->getId() . "</li>");
    echo("<li>Nouvelle note globale = " . number_format($vin->getNote(), 2) . "</li>");
    echo("<li>Votre note = " . $note . "</li>");
    echo("</ul>");
} else {
    echo("<h3>Problème d'insertion de mise à jour de la note.</h3>");
}

echo("</div>");

include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>