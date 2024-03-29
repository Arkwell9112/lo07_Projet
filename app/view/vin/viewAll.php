<!-- ----- début viewAll -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>
<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">cru</th>
            <th scope="col">année</th>
            <th scope="col">degré</th>
            <th scope="col">Note</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des vins est dans une variable $results
        foreach ($results as $element) {
            $nbnotes = $element->getNbnotes();
            if ($nbnotes == -1) {
                $note = "Non noté";
            } else {
                $note = $element->getNote();
                $note = number_format($note, 2);
            }
            printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%.2f</td><td>%s</td></tr>", $element->getId(), $element->getCru(), $element->getAnnee(), $element->getDegre(), $note);
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- ----- fin viewAll -->