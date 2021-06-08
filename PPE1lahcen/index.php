<?php
session_start();
require_once './Include/constantes.inc.php';
require_once './Include/Bibliotheque01.inc.php';
require_once './Include/SourceDonnees.inc.php';
require_once './Include/Securite.inc.php';


if (!isset($_REQUEST['action'])) 
{ // Démarrage de l'application.
    $_REQUEST['action'] = AFFICHAGE_IDENTIFICATION;
} else 
{   
    estSessionUtilisateurOuverte() == true ? "" : $_REQUEST['action'] = AFFICHAGE_IDENTIFICATION;
}
   

switch ($_REQUEST['action']) 
{
    case AFFICHAGE_IDENTIFICATION:
        require_once './Identif.php';
        break;
    
    case TRAITEMENT_IDENTIFICATION:
        require_once './Identif.php';
        break;

    case PRATICIEN_AFFICHER_LISTE:
        require_once './formPRATICIEN.php';
        break;

    case PRATICIEN_AFFICHER_FICHE:
        require_once './formPRATICIEN.php';
        break;

    case PAGE_FORM_MEDICAMENT:
        require_once './formMEDICAMENT.php';
        break;
    case MEDICAMENT_AFFICHER_LISTE_FAMILLE:
        require_once './formMEDICAMENT.php';
        break;
    case MEDICAMENT_AFFICHER_LISTE_NOM:
        require_once './formMEDICAMENT.php';
        break;

    case MEDICAMENT_AFFICHER_LISTE_FICHE:
        require_once './formMedicament.php';
        break;
    
    
    // page distribution
    case DISTRIBUTION_AFFICHER_LISTE_LABORATOIRE:
        require_once './formDISTRIBUTION.php';
        break;
    case DISTRIBUTION_AFFICHER_LISTE_MEDICAMENT:
        require_once './formDISTRIBUTION.php';
        break;
    case DISTRIBUTION_AFFICHER_DISTRIBUTION:
        require_once './formDISTRIBUTION.php';
        break;
    
    
    case 60:
        require_once './formVISITEUR.html';
        break;
    case PAGE_RAPPORT_VISITE:
        require_once './formRAPPORT_VISITE.html';
        break;
    case 324:
        destruction();
        header("location: index.php?action=" . AFFICHAGE_IDENTIFICATION);
}


require_once './Include/pied.inc.php';
?>



