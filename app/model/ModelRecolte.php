<?php
require_once("Model.php");
require_once("ModelVin.php");
require_once("ModelProducteur.php");

class ModelRecolte
{
    private $quantite;
    private $vin_id;
    private $producteur_id;
    private $vin;
    private $producteur;

    public function __construct($quantite = null, $vin = null, $producteur = null)
    {
        if (isset($quantite)) {
            $this->quantite = $quantite;
            $this->vin = $vin;
            $this->producteur = $producteur;
        }
        if (isset($this->quantite)) {
            try {
                $bdd = Model::getInstance();
                $request = $bdd->prepare("SELECT * FROM vin WHERE id=:id");
                $request->execute(array(
                    "id" => $this->vin_id
                ));
                $this->vin = $request->fetchAll(PDO::FETCH_CLASS, "ModelVin")[0];
                $request = $bdd->prepare("SELECT * FROM producteur WHERE id=:id");
                $request->execute(array(
                    "id" => $this->producteur_id
                ));
                $this->producteur = $request->fetchAll(PDO::FETCH_CLASS, "ModelProducteur")[0];
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function getAll()
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare("SELECT * FROM recolte");
            $request->execute();
            return $request->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return null
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @return null
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * @return null
     */
    public function getProducteur()
    {
        return $this->producteur;
    }
}