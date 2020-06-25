<?php
require_once("../model/ModelProducteur.php");

class ControllerProducteur
{
    public static function viewThemAll()
    {
        $producteurs = ModelProducteur::getAll();
        require("config.php");
        require("../view/producteur/viewThemAll.php");
    }

    public static function viewThemId($args)
    {
        $producteurs = ModelProducteur::getAll();
        $target = $args["target"];
        require("config.php");
        require("../view/producteur/viewThemId.php");
    }

    public static function viewThemById()
    {
        $producteurs = ModelProducteur::getOne($_GET["id"]);
        require("config.php");
        require("../view/producteur/viewThemAll.php");
    }

    public static function viewThemInsert()
    {
        require("config.php");
        require("../view/producteur/viewThemInsert.php");
    }

    public static function viewThemInserted()
    {
        if (preg_match("#^[A-Z]{1}[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]+$#", $_GET["nom"]) && preg_match("#^[A-Z]{1}[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]+$#", $_GET["prenom"]) && preg_match("#^[A-Z]{1}[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]+$#", $_GET["region"])) {
            $producteur = new ModelProducteur(-1, htmlspecialchars($_GET["nom"]), htmlspecialchars($_GET["prenom"]), htmlspecialchars($_GET["region"]));
            $result = $producteur->insert();
        } else {
            $result = -1;
        }
        require("config.php");
        require("../view/producteur/viewThemInserted.php");
    }

    public static function viewRegionAll()
    {
        $producteurs = ModelProducteur::getMany("SELECT * FROM producteur GROUP BY region", array());
        require("config.php");
        require("../view/producteur/viewRegionAll.php");
    }

    public static function prodDeleted()
    {
        $producteur = new ModelProducteur($_GET["id"]);
        $result = $producteur->delete();
        require("config.php");
        require("../view/producteur/prodDeleted.php");
    }

    public static function viewBestProd()
    {
        $bdd = Model::getInstance();
        $all = $bdd->prepare("SELECT * FROM recolte INNER JOIN vin ON vin.id=recolte.vin_id INNER JOIN producteur ON producteur.id=recolte.producteur_id WHERE vin.note!=0 GROUP BY producteur.id ORDER BY AVG(vin.note) DESC");
        $all->execute();
        $producteurs = $all->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
        require("config.php");
        require("../view/producteur/viewThemAll.php");
    }
}