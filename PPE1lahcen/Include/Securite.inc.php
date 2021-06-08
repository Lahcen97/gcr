<?php



function valideInfosCompteUtilisateur($identifiant, $MotDePasse) 
{
    return existeCompteVisiteur($identifiant, md5($MotDePasse));
}

function ouvreSessionUtilisateur($id) {
    $ligne = GetInfoVisiteur($id)->fetch();                 
    
    $_SESSION['utilId'] = $id;
    $_SESSION['utilNomPrenom'] = $ligne[0];
    $_SESSION['utilRole'] = $ligne[1];
    $_SESSION['utilRegion'] = $ligne[2];
           
}

function estSessionUtilisateurOuverte()
{

    if (isset($_SESSION['utilId']))
    {
        return true;
    }
    else 
    {
        return false;
    }
    
}

function destruction()
{
    session_destroy();
}
    
    

