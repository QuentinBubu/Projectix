<?php
require '../vendor/autoload.php';

$routeur = new AltoRouter();

$routeur->map('GET', '/', 'hello');
$routeur->map('GET', '/hello', 'hello');
$routeur->map('GET', '/home', 'home');
$routeur->map('GET', '/login', 'login');
$routeur->map('POST', '/login-back', '../App/php/LoginSignup/login', 'login-back');
$routeur->map('POST', '/signup-back', '../App/php/LoginSignup/signup', 'signup-back');

$results = $routeur->match();

if ($results != null) {
    if (is_callable($results['target'])){
        call_user_func_array($results['target'], $results['params']);
    } else {
        require "{$results['target']}.php";
    }
} else {
    require './assets/error/404.html';
}