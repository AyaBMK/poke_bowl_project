<?php

session_start();

require_once 'classes/AppError.php';
require_once 'classes/Utils.php';
require_once 'functions/db.php';


if (!isset($_POST['email']) || !isset($_POST['password'])) {
    Utils::redirect('login.php?error=');
    exit();
}

[
    'email' => $email,
    'password' => $password,
] = $_POST;

if(empty($email) || empty($password)){
    Utils::redirect('login.php?error=' . AppError::AUTH_REQUIRED_FIELDS);
    exit();
}

try {
    $pdo = getConnection();
} catch (PDOException) {
    Utils::redirect('login.php?error=' . AppError::DB_CONNECTION);
}

$query = "SELECT user_id, first_name, last_name, email, profile_picture, password, user_type FROM users WHERE email = ?";

$connectStmt = $pdo->prepare($query);
$connectStmt->execute([$email]);

$user = $connectStmt->fetch();

if ($user === false) {
    Utils::redirect('login.php?error=' . AppError::USER_NOT_FOUND);
    exit();
}


if (!password_verify($password, $user['password'])) {
    Utils::redirect('login.php?error=' . AppError::INVALID_CREDENTIALS);
}


$_SESSION['userInfos'] = [
    'id' => $user['user_id'],
    'first_name' => $user['first_name'],
    'last_name' => $user['last_name'],
    'email' => $email,
    'profile_picture' => $user['profile_picture'],
    'user_type' => $user['user_type']
];


//   Utils::redirect('index.php');

if($user['user_type'] === 0) {
    Utils::redirect('index.php');
}
if($user['user_type'] === 1) {
    Utils::redirect('admin/index.php');
}