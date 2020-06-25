<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>
    <body>
    <div class="container">
<?php
include $root . '/app/view/fragment/fragmentCaveMenu.html';
include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
if ($result == 1) {
    echo("<h3>Le nouveau producteur a été ajouté </h3>");
    echo("<ul>");
    echo("<li>ID = " . $producteur->getId() . "</li>");
    echo("<li>Nom = " . $producteur->getNom() . "</li>");
    echo("<li>Prénom = " . $producteur->getPrenom() . "</li>");
    echo("<li>Région = " . $producteur->getRegion() . "</li>");
    echo("</ul>");
} else {
    echo("<h3>Problème d'insertion du producteur</h3>");
}

echo("</div>");

include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>