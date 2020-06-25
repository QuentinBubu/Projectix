<?php

require_once('Database.php');

class User extends Database{

    private function setNewAccount($userName, $password, $passwordConfirm, $mail, $newsletter){
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
            'select'
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
                    `token`,
                    `newsletter`
                ) VALUES
                (
                    :userName,
                    :pswd,
                    :mail,
                    :creationDate,
                    :profilImage,
                    :token,
                    :newsletter
                )', 
                [
                    'userName' => $userName,
                    'pswd' => password_hash($password, PASSWORD_ARGON2ID),
                    'mail' => $mail,
                    'creationDate' => date('Y-m-d H:i:s'),
                    'profilImage' => '/ressources/pictures/default/profil.svg',
                    'token' => $token,
                    'newsletter' => $newsletter
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

    public function getNewAccount($userName, $password, $passwordConfirm, $mail, $newsletter){
        return $this->setNewAccount($userName, $password, $passwordConfirm, $mail, $newsletter);
    }

}