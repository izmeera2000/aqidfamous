<?php
// Load Composer's autoloader
require_once APP_ROOT . '/vendor/autoload.php';

// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

// Define constants for configuration variables
define('APP_ENV', getenv('APP_ENV'));
define('APP_URL', getenv('APP_URL'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));

// You can also create an array for easier management of config settings
$config = [
    'app' => [
        'env' => APP_ENV,
        'url' => APP_URL,
    ],
    'db' => [
        'host' => DB_HOST,
        'name' => DB_NAME,
        'user' => DB_USER,
        'password' => DB_PASSWORD,
    ]
];

// Use config values wherever needed in the application
