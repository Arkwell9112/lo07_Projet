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
            <th scope="col">Région</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($producteurs as $producteur) {
            printf("<tr><td>%s</td></tr>", $producteur->getRegion());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>