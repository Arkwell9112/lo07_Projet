<?php
require($root . "/app/view/fragment/fragmentCaveHeader.html");
?>
    <body>
<div class="container">
    <?php
    require($root . "/app/view/fragment/fragmentCaveMenu.html");
    require($root . "/app/view/fragment/fragmentCaveJumbotron.html");
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Région</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        foreach ($producteurs as $producteur) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $producteur->getId(), $producteur->getNom(), $producteur->getPrenom(), $producteur->getRegion());
        }
        ?>
        </tbody>
    </table>
</div>
<?php
require("$root" . "/app/view/fragment/fragmentCaveFooter.html");

