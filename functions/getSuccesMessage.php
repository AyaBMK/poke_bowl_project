<?php

require_once __DIR__ . '/../classes/AppSucces.php';


function getSuccesMessage(int $succesCode): string
{
    return match ($succesCode) {
        
        AppSucces::PRODUCT_ADDED => "Le produit a été ajouté avec succès!",
        AppSucces::PRODUCT_UPDATED => "Le produit a été modifié avec succès!",
        AppSucces::PRODUCT_DELETED => "Le produit a été supprimé avec succès!",
        AppSucces::SUCCESSFUL_REGISTRATION => "Félicitations! Inscriptions réussie",

        default => "Félicitations! ",
    };
}