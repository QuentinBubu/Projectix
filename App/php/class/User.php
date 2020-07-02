<?php

namespace App;

use App\Database;

session_start();

class User extends Database
{

    private $globalAccountInformation;

    private function setNewAccount($userName, $password, $passwordConfirm, $mail)
    {
        $accountNumber = 
        $this->request(
            'SELECT *
            FROM `users` 
            WHERE `userName` = :userName 
            OR `mail` = :mail',
            [
                'userName' => $userName,
                'mail' => $mail
            ],
            'fetchAll'
        );
        if (
            count($accountNumber) != 0
        ) {
            return 'Nom d\'utilisateur ou adresse mail déjà existante! ' .  var_dump($accountNumber);
        } elseif (
            $password !== $passwordConfirm
        ) {
            return 'Les mots de passe ne correspondent pas!';
        } elseif (
            strlen($password) < 10
            || strlen($password) > 30
        ) {
            return 'Saisissez un mot de passe entre 10 et 30 caractères!';
        } elseif (
            strlen($userName) < 5
            || strlen($userName) > 20
        ) {
            return 'Votre identifiant doit contenir entre 5 et 20 caractères!';
        } elseif (
            !filter_var($mail, FILTER_VALIDATE_EMAIL)
        ) {
            return 'Saisissez une adresse mail valide!';
        } else {
            date_default_timezone_set('Europe/Paris');
            $token = "M" . sha1(session_id() . microtime());
            if (
            $this->request(
                'INSERT INTO `users`
                (
                    `userName`,
                    `password`,
                    `mail`,
                    `creationDate`,
                    `profilImage`,
                    `token`
                ) VALUES
                (
                    :userName,
                    :pswd,
                    :mail,
                    :creationDate,
                    :profilImage,
                    :token
                )', 
                [
                    'userName' => $userName,
                    'pswd' => password_hash($password, PASSWORD_ARGON2ID),
                    'mail' => $mail,
                    'creationDate' => date('Y-m-d H:i:s'),
                    'profilImage' => '/ressources/pictures/default/profil.svg',
                    'token' => $token
                ]
            ))
            {
                $message = '
                <h1>Projectix</h1><br />
                <strong>Vous vous êtes inscris sur notre site! Merci!</strong><br />
                Pour valider votre inscription cliquer ici ' . $token . '; si ce n\'est pas vous, ignorez ce mail
                ';
                $headers = 'MIME-Version: 1.0;';
                $headers .= 'Content-type: text/html; charset=UTF-8;';
                $headers .= 'From: Projectix@assistance.com;';
                mail($mail, 'Confirmation', $message, $headers);
                return true;
            } else {
                return 'Une erreur s\'est produite!';
            }
        }

    }

    private function setConnexion($userName, $password)
    {
        $request = $this->request(
           'SELECT *
           FROM `users`
           WHERE `userName` = :userName
           OR `mail` = :userName',
        [
            'userName' => $userName
        ],
        'fetch');

        if (!$request) {
            return 'Compte introuvable';
        } elseif (!password_verify($password, $request['password'])) {
            return 'Mot de passe incorrect';
        } elseif (substr($request['token'], 0, 1) !== 'V') {
            return 'Validez d\'abord votre compte!';
        } else {
            $this->globalAccountInformation = $request;
            $this->accountType = $request['accountType'];
            $_SESSION['id'] = $request['id'];
            return true;
        }
    }

    public function getNewAccount($userName, $password, $passwordConfirm, $mail)
    {
        return $this->setNewAccount($userName, $password, $passwordConfirm, $mail);
    }

    public function getConnexion($userName, $password)
    {
        return $this->setConnexion($userName, $password);
    }

    public function getToken()
    {
        return $this->globalAccountInformation['token'];
    }

    public function getId()
    {
        return $this->globalAccountInformation['id'];
    }

    public function getUseName()
    {
        return $this->globalAccountInformation['userName'];
    }

    public function getAccountType()
    {
        return $this->globalAccountInformation['accountType'];
    }


}