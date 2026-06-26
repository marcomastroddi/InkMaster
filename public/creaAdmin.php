<?php
require_once __DIR__ . '/../vendor/autoload.php';
$entityManager = require_once __DIR__ . '/../config/bootstrap-doctrine.php';

use InkMaster\Entity\Amministratore;

$username = 'superadmin';
$password = 'InkMaster2024!';

$admin = new Amministratore(
    nome: 'Admin',
    cognome: 'InkMaster',
    password: password_hash($password, PASSWORD_DEFAULT),
    username: $username
);

$entityManager->persist($admin);
$entityManager->flush();

echo "Amministratore creato! Username: $username — Password: $password";