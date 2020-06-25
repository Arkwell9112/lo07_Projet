<!-- ----- debut ModelVin -->
<?php
require_once 'Model.php';

class ModelVin
{

    private $id, $cru, $annee, $degre;
    private $note;
    private $nbnotes;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $cru = NULL, $annee = NULL, $degre = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->cru = $cru;
            $this->annee = $annee;
            $this->degre = $degre;
        }
    }

    public function addNote($note)
    {
        try {
            $bdd = Model::getInstance();
            $request = $bdd->prepare("LOCK TABLES vin WRITE");
            $request->execute();
            $current = self::getOne($this->id)[0];
            $oldnote = $current->getNote();
            $oldnb = $current->getNbnotes();
            if ($oldnb == -1) {
                $oldnb = 0;
            }
            $newnb = $oldnb + 1;
            $currentnote = (($oldnote * $oldnb) / $newnb) + ($note / $newnb);
            $request = $bdd->prepare("UPDATE vin SET note=:note,nbnotes=:nb WHERE id=:id");
            $request->execute(array(
                "note" => $currentnote,
                "nb" => $newnb,
                "id" => $this->id
            ));
            $request = $bdd->prepare("UNLOCK TABLES");
            $request->execute();
            $this->note = $currentnote;
            $this->nbnotes = $newnb;
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
            $request = $bdd->prepare("DELETE FROM vin WHERE id=:id");
            $request->execute(array(
                "id" => $this->id
            ));
            return 1;
        } catch (PDOException $e) {
            // Pas de echo car il s'agit d'une erreur 'normale' et gérable.
            return -1;
        }
    }

    public static function view()
    {
        printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%.00f</td></tr>", $this->getId(), $this->getCru(), $this->getAnnee(), $this->getDegre());
    }

    public static function getAllId()
    {
        try {
            $database = Model::getInstance();
            $query = "select id from vin";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMany($query)
    {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from vin";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from vin where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($cru, $annee, $degre)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from vin";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into vin value (:id, :cru, :annee, :degre)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'cru' => $cru,
                'annee' => $annee,
                'degre' => $degre
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update()
    {
        echo("ModelVin : update() TODO ....");
        return null;
    }

    function setCru($cru)
    {
        $this->cru = $cru;
    }

    // Persistance .......

    function setAnnee($annee)
    {
        $this->annee = $annee;
    }

// retourne une liste des id

    function setDegre($degre)
    {
        $this->degre = $degre;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getNote()
    {
        return $this->note;
    }

    function getNbnotes()
    {
        return $this->nbnotes;
    }

    function getCru()
    {
        return $this->cru;
    }

    function getAnnee()
    {
        return $this->annee;
    }

    function getDegre()
    {
        return $this->degre;
    }

    public function __toString()
    {
        return $this->id;
    }

}

?>
<!-- ----- fin ModelVin -->
