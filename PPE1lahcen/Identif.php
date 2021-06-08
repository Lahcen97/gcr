<?php
require_once './Include/Securite.inc.php';
require_once './Include/constantes.inc.php';
require_once './Include/SourceDonnees.inc.php';


switch ($_REQUEST['action']) {
    case AFFICHAGE_IDENTIFICATION:
        require_once './Include/entete2.inc.php';
        require_once './Include/SourceDonnees.inc.php';
        require_once './Include/Bibliotheque01.inc.php';
        ?>
        <form id="frmIdentification" name="frmIdentification" method="post" action="Identif.php?action=<?php echo TRAITEMENT_IDENTIFICATION ?>">
            <fieldset> 
                <legend> Identification : </legend>
                <?php
                echo formInputText('pseudo :', 'IDENTIFICATION_NAME', 'IDENTIFICATION_ID', '', 20, 50, 10, false, true) . '<br />'
                . formInputPassword('mot de passe :', 'PASSWORD_NAME', 'PASSWORD_ID', '', 20, 50, 20) . '<br />'
                . formBoutonSubmit('ok', 'ok', 'valider', 30) . '<br />';
                ?>  
            </fieldset>
        </form>
        <?php
        require_once "./Include/pied2.inc.php";
        break;

    case TRAITEMENT_IDENTIFICATION:

        if (valideInfosCompteUtilisateur($_POST['IDENTIFICATION_NAME'], $_POST['PASSWORD_NAME'])) {
            ouvreSessionUtilisateur($_POST['IDENTIFICATION_NAME']);
            echo '<script> window.location.replace("http://localhost/PPE1lahcen/index.php?action=30") </script>';
            //header("location: index.php?action=" . PRATICIEN_AFFICHER_LISTE);
            exit();
        } else {
            require_once './Include/entete2.inc.php';
            require_once './Include/SourceDonnees.inc.php';
            require_once './Include/Bibliotheque01.inc.php';
            ?>
            <form id="frmIdentification" name="frmIdentification" method="post" action="Identif.php?action=<?php echo TRAITEMENT_IDENTIFICATION ?>">
                <fieldset> 
                    <legend> Identification : </legend>
            <?php
            echo formInputText('pseudo :', 'IDENTIFICATION_NAME', 'IDENTIFICATION_ID', '', 20, 50, 10, false, true) . '<br />'
            . formInputPassword('mot de passe :', 'PASSWORD_NAME', 'PASSWORD_ID', '', 20, 50, 20) . '<br />'
            . formBoutonSubmit('ok', 'ok', 'valider', 30) . '<br />';
            ?>  
                </fieldset>
            </form>
            <p class="erreur"> "Votre indentifiant ou mot de passe n'est pas valide" </p>  
            <?php
            require_once "./Include/pied2.inc.php";
        }
        break;
}
?>