<?php

require_once __DIR__ . "/../vendor/autoload.php";

use marcopgordillo\phpmvc\Application;
use App\controllers\SiteController;
use App\controllers\AuthController;
use App\models\User;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db'  => [
        'dsn' =>$_ENV['DB_DSN'],
        'user' =>$_ENV['DB_USER'],
        'password' =>$_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
    echo "Before Request 1";
});
$app->on(Application::EVENT_BEFORE_REQUEST, function () {
    echo "Before Request 2";
});
$app->on(Application::EVENT_AFTER_REQUEST, function () {
    echo "After Request";
});

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/profile', [AuthController::class, 'profile']);

$app->run();