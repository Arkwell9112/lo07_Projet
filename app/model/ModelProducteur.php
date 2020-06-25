<?php
require_once("Model.php");

class ModelProducteur
{
    private $id;
    private $nom;
    private $prenom;
    private $region;

    public function __construct($id = null, $nom = null, $prenom = null, $region = null)
    {
        if (isset($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->region = $region;
        }
    }

    public static function getAll()
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare("SELECT * FROM producteur");
            $request->execute();
            return $request->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    public static function getOne($id)
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare("SELECT * FROM producteur WHERE id=:id");
            $request->execute(array(
                "id" => $id
            ));
            return $request->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    public static function getMany($query, $parameters)
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare($query);
            $request->execute($parameters);
            return $request->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function insert()
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare("INSERT INTO producteur VALUES (0, :nom, :prenom, :region)");
            $request->execute(array(
                "nom" => $this->nom,
                "prenom" => $this->prenom,
                "region" => $this->region
            ));
            $this->id = $bdd->lastInsertId("producteur");
            return 1;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    public function delete()
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare("DELETE FROM producteur WHERE id=:id");
            $request->execute(array(
                "id" => $this->id
            ));
            return 1;
        } catch (PDOException $e) {
            return -1;
        }
    }
}