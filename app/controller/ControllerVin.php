<!-- ----- debut ControllerVin -->
<?php
require_once '../model/ModelVin.php';

class ControllerVin
{
    // --- page d'acceuil
    public static function caveAccueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.html';
        if (DEBUG)
            echo("ControllerVin : caveAccueil : vue = $vue");
        require($vue);
    }

    public static function viewRateId()
    {
        $results = ModelVin::getAllId();
        include 'config.php';
        require("../view/vin/viewRateId.php");
    }

    public static function viewRated()
    {
        if (preg_match("#^[0-9](\.[0-9]{1,2})?$#", $_GET["note"]) && $_GET["note"] >= 0 && $_GET["note"] <= 5) {
            $note = $_GET["note"];
            $id = $_GET["id"];
            $vin = ModelVin::getOne($id)[0];
            $result = $vin->addNote($note);
        } else {
            $result = -1;
        }
        require("config.php");
        require("../view/vin/viewRated.php");
    }

    public static function vinDeleted()
    {
        $vin = new ModelVin($_GET["id"]);
        $result = $vin->delete();
        require("config.php");
        require("../view/vin/vinDeleted.php");
    }

    // --- Liste des vins
    public static function vinReadAll()
    {
        $results = ModelVin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewAll.php';
        if (DEBUG)
            echo("ControllerVin : vinReadAll : vue = $vue");
        require($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function vinReadId($args)
    {
        $results = ModelVin::getAllId();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewId.php';
        $target = $args["target"];
        require($vue);
    }

    // Affiche un vin particulier (id)
    public static function vinReadOne()
    {
        $vin_id = $_GET['id'];
        $results = ModelVin::getOne($vin_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewAll.php';
        require($vue);
    }

    // Affiche le formulaire de creation d'un vin
    public static function vinCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewInsert.php';
        require($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function vinCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelVin::insert(
            htmlspecialchars($_GET['cru']), htmlspecialchars($_GET['annee']), htmlspecialchars($_GET['degre'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vin/viewInserted.php';
        require($vue);
    }

}

?>
<!-- ----- fin ControllerVin -->


