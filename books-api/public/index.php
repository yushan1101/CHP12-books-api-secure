<?php
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Load .env file if it exists (local dev), on Render env vars are set in dashboard
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

// Make $_ENV fall back to getenv() for Render's environment variables
foreach (array_keys(getenv()) as $key) {
    if (!isset($_ENV[$key])) {
        $_ENV[$key] = getenv($key);
    }
}

$app = AppFactory::create();

$app->add(new App\Middleware\SecurityHeaders());
$app->add(new App\Middleware\JsonBodyParser());
$app->add(new App\Middleware\Cors());
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

(require __DIR__ . '/../src/routes.php')($app);

$app->run();