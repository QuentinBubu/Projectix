<?php
/*!------CODE NON FINI--------*/
require_once('class/User.php');

$user = new User;

if ($_GET['action'] === 'login') {
    $return = $user->getConnexion(
        $_POST['username'],
        $_POST['password']
    );
} elseif ($_GET['action'] === 'register') {

    if (!isset(
        $_POST['username'],
        $_POST['password'],
        $_POST['passwordConfirm'],
        $_POST['mail']
    )
    || empty($_POST['username'])
    || empty($_POST['password'])
    || empty($_POST['passwordConfirm'])
    || empty($_POST['mail'])
    )
    ) { 
        return 'Saissisez tout les champs';
    }

        isset($_PSOT['newsletter']) ? $newsletter = true : $newsletter = false;

    $return = $user->getNewAccount
        $_POST['username'],
        $_POST['password'],
        $_POST['passwordConfirm'],
        $_POST['mail'],
        $newsletter
    );
}