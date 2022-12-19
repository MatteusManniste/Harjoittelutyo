<?php


function luoInputKentta($otsikko, $muuttujaNimi, $muuttujaArvo, $virheKentta, $kentanTyyppi = 'text')
{

    $html = "";
    $invalid_feedback = "";
    $is_invalid = "";

    if (!empty($virheKentta)) {
        $is_invalid =  'is-invalid';

        $invalid_feedback = "<div class='invalid-feedback'>";
        $invalid_feedback .= "<small>$virheKentta</small>";
        $invalid_feedback .= "</div>";
    }

    $html .= "<div class='row mb-3'>";
    $html .= "<label for='$muuttujaNimi' class='col-sm-3 col-form-label'>$otsikko</label>";
    $html .= "<div class='col-sm-9'>";
    $html .= "<input type='$kentanTyyppi' name='$muuttujaNimi' value='$muuttujaArvo' class='form-control $is_invalid'>";
    $html .= $invalid_feedback;
    $html .= "</div>";
    $html .= "</div>";

    return $html;
}

function luoTextareaKentta($otsikko, $muuttujaNimi, $muuttujaArvo, $virheKentta)
{

    $html = "";
    $invalid_feedback = "";
    $is_invalid = "";

    if (!empty($virheKentta)) {
        $is_invalid =  'is-invalid';

        $invalid_feedback = "<div class='invalid-feedback'>";
        $invalid_feedback .= "<small>$virheKentta</small>";
        $invalid_feedback .= "</div>";
    }

    $html .= "<div class='row mb-3'>";
    $html .= "<label for='$muuttujaNimi' class='col-sm-3 col-form-label'>$otsikko</label>";
    $html .= "<div class='col-sm-9'>";
    $html .= "<textarea class='form-control $is_invalid' name='$muuttujaNimi' cols='30' rows='3'>$muuttujaArvo</textarea>";
    $html .= $invalid_feedback;
    $html .= "</div>";
    $html .= "</div>";

    return $html;
}
