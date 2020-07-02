<?php

use App\User;

$user = new User;

if (!isset($_POST['cgus'])) {
    $_SESSION['error'] = 'Veuillez accepeter les coditions générals d\'utilisation';
    header('Location: /login');
    exit;
}

if (!isset(
    $_POST['username'],
    $_POST['password'],
    $_POST['passwordConfirm'],
    $_POST['email']
    )
    || empty($_POST['username'])
    || empty($_POST['password'])
    || empty($_POST['passwordConfirm'])
    || empty($_POST['email'])
    ) {
    $_SESSION['error'] = 'Saissisez tout les champs';
    header('Location: /login');
    exit;
}

$return = $user->getNewAccount(
    $_POST['username'],
    $_POST['password'],
    $_POST['passwordConfirm'],
    $_POST['email'],
);

if ($return) {
    header('Location: /hello');
    exit;
} else {
    $_SESSION['error'] = $return;
    header('Location: /login');
    exit;
}
