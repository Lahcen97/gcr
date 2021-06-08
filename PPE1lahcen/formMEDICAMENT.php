<?php require_once './Include/entete.inc.php';?>
<div id="droite">
    <h1> Pharmacopée </h1>
    <?php
    
    switch ($_REQUEST['action']) 
    {
        case MEDICAMENT_AFFICHER_LISTE_FAMILLE:
            ?>
    <form name="formChoixFamilleMedicaments" method="post" action="index.php?action=<?php echo MEDICAMENT_AFFICHER_LISTE_NOM; ?>">
            <?php
            echo formSelectDepuisRecordset('liste des familles de medicaments :', 'famille_nom', 'famille_id', getListeFamilleMedicament(), 10);
            echo formBoutonSubmit('submit1', 'submit1', 'ok', 20);
            ?>
            </form>
    
            <?php
            break;
        case MEDICAMENT_AFFICHER_LISTE_NOM:
            ?>
        
            <form name="formChoixMedicament" method="post" action="index.php?action=<?php echo MEDICAMENT_AFFICHER_LISTE_FICHE; ?>">           
            <?php
            echo formSelectDepuisRecordset('liste des familles de medicaments :', 'famille_nom', 'famille_id', getListeFamilleMedicament(), 10,$_POST['famille_nom']) ;
            echo formBoutonSubmit('submit1', 'submit1', 'ok', 20) . '<br/>';
            echo formSelectDepuisRecordset('liste des medicaments :', 'medicament_nom', 'medicament_id', getListeMedicament($_POST['famille_nom']), 30);
            echo formBoutonSubmit('submit2', 'submit2', 'ok', 40);
            ?>
            </form>
    
            <?php 
            break;
        case MEDICAMENT_AFFICHER_LISTE_FICHE:
            ?>          
            
            <form name="formMedicament" method="post" action="index.php?action=<?php echo MEDICAMENT_AFFICHER_LISTE_FICHE; ?>"> 
            <?php
            echo formSelectDepuisRecordset('liste des familles de medicaments :', 'famille_nom', 'famille_id', getListeFamilleMedicament(), 10,$_POST['famille_nom']);
            echo formBoutonSubmit('submit1', 'submit1', 'ok', 20) ;
            echo formSelectDepuisRecordset('liste des medicaments :', 'medicament_nom', 'medicament_id', getListeMedicament($_POST['famille_nom']), 30,$_POST['medicament_nom']);
            echo formBoutonSubmit('submit2', 'submit2', 'ok', 40);
            ?>
                
            </form>
            </div>
            <div id="bas">
            <?php
            
            echo getListeInfosMedicament($_POST['medicament_nom']);
            ?>
            
            </div>
            <?php       
            break;
    }
            require_once INCLUDES_PIED;
            ?>

<?php require_once './Include/pied.inc.php';?>