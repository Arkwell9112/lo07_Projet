<?php
require_once("../model/ModelRecolte.php");

class ControllerRecolte
{
    public static function viewRecolteAll()
    {
        $recoltes = ModelRecolte::getAll();
        require("config.php");
        require("../view/recolte/viewRecolteAll.php");
    }

    public static function viewRecolteId($args)
    {
        $target = $args["target"];
        $table = $args["table"];
        if ($table == "vin") {
            $things = ModelVin::getAll();
        } else if ($table == "Producteur") {
            $things = ModelProducteur::getAll();
        }
        require("config.php");
        require("../view/recolte/viewRecolteId.php");
    }

    public static function viewRecolteByVinId()
    {
        $bdd = Model::getInstance();
        $request = $bdd->prepare("SELECT * FROM recolte WHERE vin_id=:id");
        $request->execute(array(
            "id" => $_GET["id"]
        ));
        $recoltes = $request->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
        require("config.php");
        require("../view/recolte/viewRecolteAll.php");
    }

    public static function viewRecolteByProducteurId()
    {
        $bdd = Model::getInstance();
        $request = $bdd->prepare("SELECT * FROM recolte WHERE producteur_id=:id");
        $request->execute(array(
            "id" => $_GET["id"]
        ));
        $recoltes = $request->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
        require("config.php");
        require("../view/recolte/viewRecolteAll.php");
    }
}