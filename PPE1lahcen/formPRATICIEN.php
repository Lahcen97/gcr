<?php require_once './Include/entete.inc.php';?>
<div id="droite">
    <?php
    switch ($_REQUEST['action']) {

        case PRATICIEN_AFFICHER_LISTE:
            ?>
            <h1> Praticiens </h1>

            <form name="formListeRecherche" method="post" action="index.php?action=<?php echo PRATICIEN_AFFICHER_FICHE; ?>">
                <?php
                echo formSelectDepuisRecordset('liste des praticien :', 'praticien_nom', 'praticien_id', getListePraticiens(), 10);
                echo formBoutonSubmit('ok', 'ok1', 'submit', 20);
                ?>

            </form>
            <?php
            break;

        case PRATICIEN_AFFICHER_FICHE:
            ?>
            <form id="formPraticien" name="formPraticien" method="post" action="index.php?action=<?php echo PRATICIEN_AFFICHER_FICHE; ?>">
                <?php 
                echo formSelectDepuisRecordset('liste des praticien :', 'praticien_nom', 'praticien_id', getListePraticiens(), 10,$_POST['praticien_nom']);
                echo formBoutonSubmit('ok', 'ok2', 'submit', 20);    
                ?>
                
            </form>
            <?php
                echo getInfosPraticien($_POST['praticien_nom']);
            break;
    }
    require_once INCLUDES_PIED;
    ?>
<?php require_once './Include/pied.inc.php';?>