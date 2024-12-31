<?php
// bootstrap/app.php

// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables (if using vlucas/phpdotenv)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Optionally set up some configuration
define('APP_ENV', getenv('APP_ENV'));
define('APP_URL', getenv('APP_URL'));
