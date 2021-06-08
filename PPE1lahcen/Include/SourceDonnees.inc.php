<?php

function SGBDConnect() {
    try {
        $connexion = new PDO('mysql:host=localhost; dbname=gsb', 'root','');
        $connexion->query('SET NAMES UTF8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'erreur !:' . $e->getMessage() . '<br/>';
        exit();
    }
    return $connexion;
}

function getListePraticiens() {
    $requete = 'SELECT PRA_NUM, concat(PRA_NOM," ",PRA_PRENOM) FROM praticien order by PRA_NOM';
    $resultat = SGBDConnect()->query($requete);

    return $resultat;
}

function getListeFamilleMedicament() {
    $requete = 'SELECT FAM_CODE, FAM_LIBELLE FROM famille order by FAM_LIBELLE';
    $resultat = SGBDConnect()->query($requete);
    return $resultat;
}

function getListeMedicament($famille) {
    $requete = 'SELECT MED_CODE, MED_NOM FROM medicament where MED_FAMILLE="' . $famille . '" order by MED_NOM';
    $resultat = SGBDConnect()->query($requete);
    return $resultat;
}

function getListeLaboratoire(){
    $requete= ' select LAB_CODE, LAB_NOM FROM laboratoire order by LAB_NOM ';
    $resultat = SGBDConnect()->query($requete);
    return $resultat;
}
function getListeMedicamentDistribution($CODE){
    $requete= ' select MED_CODE, MED_NOM FROM medicament where MED_LABO="' . $CODE. '" order by MED_NOM ';
    $resultat = SGBDConnect()->query($requete);
    return $resultat;
    
}
function existeCompteVisiteur($VIS_CODE, $MDP) {
    $requete = 'select visiteur.VIS_CODE, visiteur.VIS_PASSE '
            . ' FROM visiteur '
            . ' WHERE VIS_CODE =\'' . $VIS_CODE . '\''
            . ' and VIS_PASSE=\'' . $MDP . '\'';
    $resultat = SGBDConnect()->query($requete);

    return $resultat->rowCount();
}

function GetInfoVisiteur($VIS_CODE)
{
    $requete = 'select concat(visiteur.VIS_NOM," ",visiteur.VIS_PRENOM),travail.TRA_ROLE, region.REG_NOM FROM visiteur inner join travail on visiteur.VIS_CODE=travail.TRA_VIS inner join region on region.REG_CODE=travail.TRA_REG ' 
           . ' WHERE VIS_CODE =\'' . $VIS_CODE . '\'';
    
    $resultat = SGBDConnect()->query($requete);
    
    return $resultat;
}