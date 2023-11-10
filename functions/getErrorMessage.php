<?php

require_once __DIR__ .  '/../classes/AppError.php'; 


function getErrorMessage(int $errorCode): string
{
    return match ($errorCode) {
        AppError::DB_CONNECTION => "Erreur lors de la connexion à la base de données",
        AppError::AUTH_REQUIRED_FIELDS => 'Erreur',
        AppError::REQUIRED_FIELDS => 'Tous les champs sont obligatoires.',
        AppError::INVALID_CREDENTIALS => 'Mot de passe incorrecte',
        AppError::USER_NOT_FOUND => "Utilisateur non trouvé",
        AppError::EMAIL_DUPLICATE => "L'email existe déjà dans la newsletter",
        AppError::PASSWORD_NOT_MATCH => 'Les mots de passe ne correspondent pas',
        AppError::FORMAT_NOT_CORRECT => 'Le format n\'est pas correct',
        AppError::EMAIL_ALREADY_EXISTS => 'Cette adresse e-mail est déjà associée à un compte. Veuillez utiliser une adresse e-mail différente.',

        default => "Une erreur est survenue",
    };
}