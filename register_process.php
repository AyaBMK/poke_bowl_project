<?php

require_once 'functions/db.php';
require_once 'classes/AppError.php';
require_once 'classes/Utils.php';
require_once 'classes/AppSucces.php';

// poke_bowl_project
// 4ct.tG6kBnop9Vpz

try {
    $pdo = getConnection();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données: " . $e->getMessage();
    exit;
}


if (isset($_POST['bouton'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $profile_picture = $_FILES['profile_pic'];

    $bytes = random_bytes(10);
    
    $filename = bin2hex($bytes);
    
    $profilePictureExt = pathinfo($profile_picture['name'], PATHINFO_EXTENSION);

    
    $filename .= '.' . $profilePictureExt;
    
    $destination = __DIR__ . '/uploads/profile_pictures/' . $filename;

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || empty($profile_picture['tmp_name'])) {
        utils::redirect('register.php?error=' . AppError::REQUIRED_FIELDS) ;
        exit;
    }

    $emailCheckStmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $emailCheckStmt->bindValue(':email', $email);
    $emailCheckStmt->execute();
    $existingUser = $emailCheckStmt->fetch();

    if ($existingUser) {
        Utils::redirect('register.php?error=' . AppError::EMAIL_ALREADY_EXISTS); 
        exit;
    }

    if ($password !== $confirm_password) {
        Utils::redirect('register.php?error=' . AppError::PASSWORD_NOT_MATCH); 
        exit;
    }

    if (!is_uploaded_file($profile_picture['tmp_name']) || $profile_picture['error'] !== UPLOAD_ERR_OK) {
        Utils::redirect('register.php?error=' . AppError::REGISTER_FILE_UPLOAD);
    }

    if (!move_uploaded_file($profile_picture['tmp_name'], $destination)) {
        Utils::redirect('register.php?error=' . AppError::REGISTER_FILE_UPLOAD);
    }



    
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, profile_picture) VALUES (:first_name, :last_name, :email, :password, :profile_picture)");

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $hashed_password);
    $stmt->bindValue(':profile_picture', $filename);

    $stmt->execute();
    Utils::redirect('login.php?succes=' . AppSucces::SUCCESSFUL_REGISTRATION); 
}

