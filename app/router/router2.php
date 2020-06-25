<!-- ----- debut Router1 -->
<?php
require('../controller/ControllerVin.php');
require_once("../controller/ControllerProducteur.php");
require_once("../controller/ControllerIdea.php");
require_once("../controller/ControllerRecolte.php");

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
unset($param["action"]);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "vinReadAll" :
    case "vinReadOne" :
    case "vinReadId" :
    case "vinCreate" :
    case "vinCreated" :
    case "vinDeleted":
    case "viewRateId":
    case "viewRated":
        ControllerVin::$action($args);
        break;

    case "prodDeleted":
    case "viewRegionAll":
    case "viewThemInserted":
    case "viewThemInsert":
    case "viewThemById":
    case "viewThemId":
    case "viewThemAll":
    case "viewBestProd":
        ControllerProducteur::$action($args);
        break;

    case "viewIdea":
    case "viewProjet":
        ControllerIdea::$action();
        break;

    case "viewRecolteAll":
    case "viewRecolteId":
    case "viewRecolteByVinId":
    case "viewRecolteByProducteurId";
        ControllerRecolte::$action($args);
        break;

    // Tache par défaut
    default:
        $action = "caveAccueil";
        ControllerVin::$action();
}
?>
<!-- ----- Fin Router1 -->

