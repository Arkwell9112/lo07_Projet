<!-- ----- début viewId -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>
<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    // $results contient un tableau avec la liste des clés.
    ?>
    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='viewRated'>
            <label for="id">ID : </label> <select class="form-control" id='id' name='id' style="width: 100px">
                <?php
                foreach ($results as $id) {
                    echo("<option>$id</option>");
                }
                ?>
            </select><br>
            <label for="note">Note : </label>
            <input type="text" name="note" placeholder="5.00">
        </div>
        <button class="btn btn-primary" type="submit">Valider</button>
    </form>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- ----- fin viewId -->