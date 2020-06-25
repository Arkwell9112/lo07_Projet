<!-- ----- début viewInserted -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>
<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    if ($result == 1) {
        echo("<h3>Le producteur a bien été supprimé.</h3>");
    } else {
        echo("<h3>Problème lors de la suppresion du producteur. Il est peut-être utilisé dans la table des récoltes.</h3>");
    }
    ?>
</div>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
<!-- ----- fin viewInserted -->