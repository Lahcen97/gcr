<?php

require_once './include/SourceDonnees.inc.php';

function formSelectDepuisRecordset($TitreLabel, $name, $id, $recordset, $tabindex, $selected = null) {

    $code = '<label for="' . $id . '">' . $TitreLabel . '</label>' . "\n"
            . '    <select name="' . $name . '" id="' . $id . '" class="titre" tabindex="' . $tabindex . '">' . "\n";

   
    $ligne = $recordset->fetch(PDO::FETCH_NUM);

    if ($selected == null) {
        while ($ligne) {
            $code .= '<option value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $recordset->fetch();
        }
    } else {
        while ($ligne) {
            $code .= '<option ' . ($ligne[0] == $selected ? 'selected="selected"' :'') . ' value="' . $ligne[0] . '">' . $ligne[1] . '</option>';
            $ligne = $recordset->fetch();
        }     
    }
    $code .= '</select>';
    return $code;
}

function formInputText($label, $name, $idText, $value, $taille, $maxLength, $tabIndex, $readOnly,$required) {
    $readyOnlyText = '';
    $requireText = '';
    
    if ($readOnly != false) {
        $readyOnlyText = ' readonly="readonly"';
    }
    if ($required!=false) {
        $requireText =' required="required"';
    }
    
    return '<label for="'.$idText.'">' . $label . ' </label>'
         . '<input type="text" id="' . $idText . '" name="' . $name . '" class="zone" value="' . $value . '" size="' . $taille . '" maxlength="' . $maxLength . '" tabindex="' . $tabIndex . '" '."$requireText".' "'.$readyOnlyText.'">';
}

function formInputPassword($label,$name,$id,$value,$size,$maxLength,$tabIndex)
{
    $code = '<label for="'.$id.'">' . $label . ' </label><input type="password" id="' . $id . '" name="' . $name . '" size="' . $size . '" maxlength="' . $maxLength . '" tabindex="' . $tabIndex . '"';

    $code .= ' required="required" class="zone" value="' . $value . '" />';
    return $code;

}

function getInfosPraticien($NumPraticien) {
    $requete = 'SELECT PRA_NOM, PRA_PRENOM, PRA_CP, PRA_ADRESSE, PRA_VILLE, PRA_COEF, TYP_LIBELLE '
            . 'FROM PRATICIEN INNER JOIN TYPE_PRATICIEN ON PRA_TYPE=TYP_CODE '
            . 'WHERE PRA_NUM =' . $NumPraticien;

    $resultat = SGBDConnect()->query($requete);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    $ligne = $resultat->fetch();

    return formInputText("Nom : :", "PRA_NOM", "PRA_NOM", $ligne[0], 50, 50, 50, true,false) . "<br />\n"
            . formInputText("Prenom :", "PRA_PRENOM", "PRA_PRENOM", $ligne[1], 50, 50, 60, true,false) . "<br />\n"
            . formInputText("Adresse :", "PRA_ADRESSE", "PRA_ADRESSE", $ligne[3], 50, 50, 70, true,false) . "<br />\n"
            . formInputText("Ville :", "PRA_VILLE", "PRA_VILLE", $ligne[2] . ' ' . $ligne[4], 50, 50, 80, true,false) . "<br />\n"
            . formInputText("Coefficient :", "PRA_COEF", "PRA_COEF", $ligne[5], 50, 50, 90, true,false) . "<br />\n"
            . formInputText("Lieu", "PRA_TYPE", "PRA_TYPE", $ligne[6], 50, 50, 100, true,false) . "<br />\n";
}

function formBoutonSubmit($nom, $id, $valeur, $indextab) {
    return $code = '<input type="submit" name=' . $nom . ' id=' . $id . ' value=' . $valeur . ' tabindex=' . $indextab . "/>";
}

function formInputHidden($nom, $id, $valeur) {
    return $code = '<inpute type="hidden" name=' . $nom . 'id=' . $id . 'value=' . $valeur . '/>';
}

function formTextArea($label, $nom, $id, $valeur, $cols, $rows, $LongueurMaxi, $Index, $ReadOnly = false) {
    $code = '<label class="titre">' . $label . ' :</label>'
            . '<textarea name=' . $nom . ' id=' . $id . ' cols=' . $cols . ' rows=' . $rows . ' maxlength=' . $LongueurMaxi . ' tabindex=' . $Index;
    if ($ReadOnly = true) {
        $code .= ' readonly="readonly"> ' . $valeur . ' </textarea><br>';
    } else {
        $code .= ' > ' . $valeur . '</textarea><br>';
    }
    return $code;
}

function getListeInfosMedicament($CODE_MED) {
    $requete = 'select MED_CODE , MED_NOM , MED_LABO, MED_FAMILLE , MED_COMPO , MED_EFFETS , MED_CONTREINDIC FROM medicament where MED_CODE="' . $CODE_MED . '" order by MED_NOM ';
    $resultat = SGBDConnect()->query($requete);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    $ligne = $resultat->fetch();

    echo formInputText('NOM COMMERCIAL :', 'MED_', 'MED_NOMCOMMERCIAL', $ligne[1], 20, 50, 95, true, false) . "<br />\n"
    . formTextArea('COMPOSITION', "MED_COMPOSITION", "MED_CONTREINDIC", $ligne[4], 50, 5, 200, 90, true,false) . "<br />\n"
    . formTextArea('EFFETS', "MED_EFFETS", "MED_CONTREINDIC", $ligne[5], 50, 5, 200, 100, true,false) . "<br />\n"
    . formTextArea('CONTRE INDIC', "MED_CONTREINDIC", "MED_CONTREINDIC", $ligne[2], 50, 5, 200, 110, true,false) . "<br />\n"
    . formInputText('LABORATOIRE :', 'MED_LABO', 'MED_LABO', $ligne[3], 20, 50, 120, true,false);
}
?>



