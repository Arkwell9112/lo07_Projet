<?php include $root . "/app/view/fragment/fragmentCaveHeader.html"; ?>
    <body>
<div class="container">
    <?php
    include $root . "/app/view/fragment/fragmentCaveMenu.html";
    include $root . "/app/view/fragment/fragmentCaveJumbotron.html";
    ?>
    <p>
        DOCUMENTATION DU PROJET :<br><br><br>
        I. Liste des récoltes<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbspCette fonction permet au visiteur d'avoir un apperçu du contenu de la base du site pour pouvoir ensuite utiliser les autres fonctions du site.<br><br>
        II. Sélection récolte par ID vin<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbspCette fonction permet notamment à un visiteur de connaître quels producteurs produisent le vin en question.
        Ainsi si le vin a plu au visiteur il est en mesure de retrouver les producteurs qui le produisent et donc d'autres vins produits par ces mêmes producteurs et qui pourraient par conséquent potentiellement leur plaire.<br><br>
        III. Sélection récolte par ID producteur<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbspCette fonction, utilisée conjointement avec la précédente permet au visisteur de trouver facilement tous les vins produits par un producteur. Par conséquent, cela lui permet potentiellement de trouver un nouveau vin qui pourrait lui plaire si d'autres vins de ce producteur lui plaisent déjà.<br><br>
        IV. Noter vin par ID<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbspCette fonction permet de noter un vin. Cela permet aux visiteurs de partager leur expérience sur un vin sous la forme d'une note. Cela permet aussi à un visisteur de choisir un vin en fonction de sa qualité.
        Cet outil peut aussi être utilisé par les producteurs pour obtenir un feedback sur la qualité de leur production.<br><br>
        V. Liste des producteurs les mieux notés<br><br>
        &nbsp&nbsp&nbsp&nbsp&nbspCette fonction permet à un utilisateur de facilement trouver les producteurs disposant de la meilleure moyenne sur leux vins.
        Ainsi le visisteur peut facilement, via les autres fonctions du site trouver les vins produits par ce producteur qui sont potentiellement de bonne qualité.
    </p>
</div>
<?php
include $root . "/app/view/fragment/fragmentCaveFooter.html";
?>