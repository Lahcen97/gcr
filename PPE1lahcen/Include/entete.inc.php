<?php
require_once './include/constantes.inc.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>

        <title>GSB : Suivi de la Visite medicale </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href='.\Styles\gcr.css' >

    </head>

    <body>
        <div>
            <h1>
                <img src="Images/logo.jpg" alt="logo" width="100" height="60"/>
                GCR  Gestion des comptes rendus de visite
            </h1>
        </div>
        <div id="gauche">
            <h2>Outils</h2>
            <p id="infosUtil">
                <?php echo $_SESSION['utilNomPrenom'] . '<br />' 
                        . $_SESSION['utilRole'] . '<br />' 
                        . $_SESSION['utilRegion']. '<br />';
            
            ?>
                
            </p>
            <h3>Comptes-Rendus</h3>
            <ul>
               
                <li>
                    <a href="formRAPPORT_VISITE.html" > Nouveaux</a>
                </li>
                <li>
                    <a href="formVISITEUR.html" > Visiteur </a> 
                </li>
            </ul>
            <h3>Consulter</h3>
            <ul>    
                <li>
                    <a href="index.php?action=<?php echo MEDICAMENT_AFFICHER_LISTE_FAMILLE; ?> ">Medicaments</a>
                </li>
                <li>
                    <a href="index.php?action=<?php echo PRATICIEN_AFFICHER_LISTE; ?> ">Praticiens</a>
                </li>
                <li>
                    <a href="index.php?action=<?php echo DISTRIBUTION_AFFICHER_LISTE_LABORATOIRE ?> "> Historique distribution </a>
                </li>
                <li> 
                    <a href="index.php?action=<?php echo PAGE_RAPPORT_VISITE; ?> " >  Rapport visite </a>
                </li>
                <li> 
                    <a href="index.php?action=324" > Deconnexion </a>
                </li>
          
            </ul>

        </div>


