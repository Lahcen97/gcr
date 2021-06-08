<?php require_once './Include/entete.inc.php';?>
<div id="droite">
 <h1> Historique de distribution </h1>
    <?php
    
    switch ($_REQUEST['action']) 
    {
        case DISTRIBUTION_AFFICHER_LISTE_LABORATOIRE:
            ?>
    <form name="formChoixFamilleMedicaments" method="post" action="index.php?action=<?php echo DISTRIBUTION_AFFICHER_LISTE_MEDICAMENT; ?>">
            <?php
            echo formSelectDepuisRecordset('liste des laboratoires :', 'laboratoire_nom', 'laboratoire_id', getListeLaboratoire(), 10);
            echo formBoutonSubmit('submit1', 'submit1', 'ok', 20);
            ?>
            </form>
    
            <?php
            break;
        case DISTRIBUTION_AFFICHER_LISTE_MEDICAMENT:
            ?>
        
            <form name="formChoixMedicament" method="post" action="index.php?action=<?php echo DISTRIBUTION_AFFICHER_DISTRIBUTION; ?>">           
            <?php
            echo formSelectDepuisRecordset('liste des laboratoires :', 'laboratoire_nom', 'laboratoire_id',getListeLaboratoire(), 10,$_POST['laboratoire_nom']) ;
            echo formBoutonSubmit('submit1', 'submit1', 'ok', 20) . '<br/>';
            echo formSelectDepuisRecordset('liste des medicaments :', 'medicament_nom', 'medicament_id', getListeMedicamentDistribution($_POST['laboratoire_nom']), 30);
            echo formBoutonSubmit('submit2', 'submit2', 'ok', 40);
            ?>
            </form>
    
            <?php 
            break;
        case DISTRIBUTION_AFFICHER_DISTRIBUTION:
            ?>          
            
            <form name="formMedicament" method="post" action="index.php?action=<?php echo  DISTRIBUTION_AFFICHER_DISTRIBUTION; ?>"> 
            <?php
            echo formSelectDepuisRecordset('liste des laboratoires :', 'laboratoire_nom', 'laboratoire_id',getListeLaboratoire(), 10,$_POST['laboratoire_nom']) ;
            echo formBoutonSubmit('submit1', 'submit1', 'ok', 20) . '<br/>';
            echo formSelectDepuisRecordset('liste des medicaments :', 'medicament_nom', 'medicament_id', getListeMedicamentDistribution($_POST['laboratoire_nom']), 30);
            echo formBoutonSubmit('submit2', 'submit2', 'ok', 40);
            ?>
                
            </form>
 
            
            </div>
            <div id="bas">
           
            
          
            <?php       
            break;
    }
require_once './Include/pied.inc.php';?>