<?php include $root . "/app/view/fragment/fragmentCaveHeader.html"; ?>
    <body>
<div class="container">
    <?php
    include $root . "/app/view/fragment/fragmentCaveMenu.html";
    include $root . "/app/view/fragment/fragmentCaveJumbotron.html";
    ?>
    <p>
        Idées :<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbsp-Utiliser un véritable fichier de config texte extérieur au projet (stocké autre part que directement dans le
        projet) pour éviter d'envoyer
        des mots de passe de base de donnée lors de push github ( ou gitlab ou autre ...).<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbsp-Mettre la définition de DEBUG dans un fichier séparé avec un require_once dans config.php pour éviter la double
        définition de la constante lors de l'insertion de config.php
        dans les controllers.
    </p>
</div>
<?php
include $root . "/app/view/fragment/fragmentCaveFooter.html";
?>