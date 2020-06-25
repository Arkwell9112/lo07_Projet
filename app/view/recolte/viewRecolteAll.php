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
            <th scope="col">Quantité</th>
            <th scope="col">Nom du cru</th>
            <th scope="col">Prénom producteur</th>
            <th scope="col">Nom producteur</th>
            <th scope="col">Région</th>
            <th scope="col">Année du cru</th>
            <th scope="col">Note</th>
            <th scope="col">ID vin</th>
            <th scope="col">ID producteur</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        foreach ($recoltes as $recolte) {
            $producteur = $recolte->getProducteur();
            $vin = $recolte->getVin();
            $note = $vin->getNote();
            $nbnotes = $vin->getNbnotes();
            if ($nbnotes == -1) {
                $note = "Non noté";
            } else {
                $note = number_format($note, 2);
            }
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $recolte->getQuantite(), $vin->getCru(), $producteur->getPrenom(), $producteur->getNom(), $producteur->getRegion(), $vin->getAnnee(), $note, $vin->getId(), $producteur->getId());
        }
        ?>
        </tbody>
    </table>
</div>
<?php
require("$root" . "/app/view/fragment/fragmentCaveFooter.html");